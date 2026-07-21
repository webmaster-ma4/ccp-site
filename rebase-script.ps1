# Replace 'pick bd87264' with 'drop bd87264' in the rebase todo file
$file = $args[0]
(Get-Content $file) | ForEach-Object { $_ -replace '^pick bd87264', 'drop bd87264' } | Set-Content $file
