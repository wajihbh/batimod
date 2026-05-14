#!/usr/bin/env python3
"""One-shot migration: mysql_* -> mysqli_* in batimod PHP files."""
from __future__ import annotations

import re
import sys
from pathlib import Path

ROOT = Path(__file__).resolve().parent


def transform(content: str) -> str:
    s = content
    s = s.replace("mysql_fetch_array($result, MYSQL_ASSOC)", "mysqli_fetch_array($result, MYSQLI_ASSOC)")
    s = s.replace("MYSQL_ASSOC", "MYSQLI_ASSOC").replace("MYSQL_NUM", "MYSQLI_NUM").replace("MYSQL_BOTH", "MYSQLI_BOTH")

    s = re.sub(r"\bmysql_close\s*\(\s*\$con\s*\)", r"mysqli_close($con)", s)
    s = re.sub(r"\bmysql_affected_rows\s*\(\s*\)", r"mysqli_affected_rows($con)", s)
    s = re.sub(r"\bmysql_errno\s*\(\s*\)", r"mysqli_errno($con)", s)
    s = re.sub(r"\bmysql_error\s*\(\s*\$con\s*\)", r"mysqli_error($con)", s)
    s = re.sub(r"\bmysql_error\s*\(\s*\)", r"mysqli_error($con)", s)

    s = re.sub(r"\bmysql_num_rows\s*\(\s*", r"mysqli_num_rows(", s)
    s = re.sub(r"\bmysql_fetch_assoc\s*\(\s*", r"mysqli_fetch_assoc(", s)
    s = re.sub(r"\bmysql_fetch_row\s*\(\s*", r"mysqli_fetch_row(", s)
    s = re.sub(r"\bmysql_fetch_array\s*\(\s*", r"mysqli_fetch_array(", s)
    s = re.sub(r"\bmysql_free_result\s*\(\s*", r"mysqli_free_result(", s)

    s = re.sub(r"\bmysql_real_escape_string\s*\(\s*", r"mysqli_real_escape_string($con, ", s)

    s = re.sub(r"\bmysql_query\s*\(\s*([^,()]+)\s*,\s*\$con\s*\)", r"mysqli_query($con, \1)", s)
    s = re.sub(r"\bmysql_query\s*\(\s*", r"mysqli_query($con, ", s)

    return s


def read_text(path: Path) -> str:
    return path.read_bytes().decode("utf-8", errors="replace")


def write_text(path: Path, text: str) -> None:
    path.write_bytes(text.encode("utf-8"))


def main() -> int:
    changed = 0
    for path in sorted(ROOT.rglob("*.php")):
        rel = path.relative_to(ROOT)
        if str(rel).startswith("_"):
            continue
        text = read_text(path)
        if "mysql_" not in text:
            continue
        new = transform(text)
        if new != text:
            write_text(path, new)
            changed += 1
            print(rel)
    print(f"Updated {changed} files.", file=sys.stderr)
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
