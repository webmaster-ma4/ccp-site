@echo off
powershell -Command "(Get-Content '%1') | ForEach-Object { $_ -replace '^pick bd87264', 'drop bd87264' } | Set-Content '%1'"
