"""One-off: replace ext/mysql-style calls with mysqli ($con). Run from repo root."""
from __future__ import annotations

import re
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
SKIP_DIRS = {"vendor", "node_modules", "tools"}
SKIP_FILES = {"mysql_compat.php"}


def transform(content: str) -> str:
    # mysql_real_escape_string($a, $con) -> mysqli_real_escape_string($con, $a)
    content = re.sub(
        r"mysql_real_escape_string\s*\(\s*([^,]+?)\s*,\s*\$con\s*\)",
        r"mysqli_real_escape_string($con, \1)",
        content,
    )
    # mysql_query($sql, $con)
    content = re.sub(
        r"mysql_query\s*\(\s*([^,]+?)\s*,\s*\$con\s*\)",
        r"mysqli_query($con, \1)",
        content,
    )
    # mysql_query( -> mysqli_query($con,
    content = re.sub(r"\bmysql_query\s*\(", "mysqli_query($con, ", content)
    content = re.sub(r"\bmysql_fetch_assoc\s*\(", "mysqli_fetch_assoc(", content)
    content = re.sub(r"\bmysql_fetch_row\s*\(", "mysqli_fetch_row(", content)
    content = re.sub(r"\bmysql_fetch_array\s*\(", "mysqli_fetch_array(", content)
    content = re.sub(r"\bmysql_num_rows\s*\(", "mysqli_num_rows(", content)
    content = re.sub(r"\bmysql_affected_rows\s*\(\s*\$con\s*\)", "mysqli_affected_rows($con)", content)
    content = re.sub(r"\bmysql_affected_rows\s*\(\s*\)", "mysqli_affected_rows($con)", content)
    content = re.sub(r"\bmysql_error\s*\(\s*\$con\s*\)", "mysqli_error($con)", content)
    content = re.sub(r"\bmysql_error\s*\(\s*\)", "mysqli_error($con)", content)
    content = re.sub(r"\bmysql_close\s*\(\s*\$con\s*\)", "mysqli_close($con)", content)
    content = re.sub(r"\bmysql_close\s*\(\s*\)", "mysqli_close($con)", content)
    # one-arg mysql_real_escape_string (after two-arg form)
    content = re.sub(
        r"mysql_real_escape_string\s*\(\s*([^)]+?)\s*\)",
        r"mysqli_real_escape_string($con, \1)",
        content,
    )
    return content


def main() -> int:
    changed = 0
    for path in sorted(ROOT.rglob("*.php")):
        if any(p in SKIP_DIRS for p in path.parts):
            continue
        if path.name in SKIP_FILES:
            continue
        text = path.read_text(encoding="utf-8", errors="replace")
        if "mysql_" not in text:
            continue
        new = transform(text)
        if new != text:
            path.write_text(new, encoding="utf-8", newline="\n")
            changed += 1
            print(path.relative_to(ROOT))
    print(f"Updated {changed} files.")
    return 0


if __name__ == "__main__":
    sys.exit(main())
