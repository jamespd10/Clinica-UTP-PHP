<script type="text/javascript">
    sessionStorage.clear();
</script>

<?php
session_start();

// Borra contenido de las sesiones
unset ($SESSION['Cedula']);
unset ($SESSION['nav']);

//Destruye las sesiones
session_destroy();

header('Location: ../../');
?>