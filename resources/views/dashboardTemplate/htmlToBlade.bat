for %%f in (*.html) do (
    :: Copia el archivo con la nueva extensión .hbs
    copy "%%f" "%%~nf.blade.php"
)