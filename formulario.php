<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formulario.css">
   <script src="js/formulario.js"></script>
    <title>Formulario</title>
</head>
<body>


    
<div id='browser'>
  <div id='browser-bar'>
   
    <p>Reportes</p>
   
  </div>
  <div id='content'>
    <div id='left'>
      <div id='map'>
        <p>Reportes Guaymas</p>
        <div class='map-locator'>
          <div class='tooltip'>
            <ul>
              <li>
                <span class='entypo-location'></span>
                <span class='selectedLocation'>20</span>
              </li>
              <li>
                <span class='entypo-mail'></span>
                <a href='#'>Basura</a>
              </li>
              
            </ul>
          </div>
        </div>
        <div class='zoom'></div>
      </div>
    
    </div>
    <div id='right'>
   
     
      <form>
        <p>Genera tu reporte</p>
        <input placeholder='Concepto' type='text'>
        <textarea placeholder='Descripcion' rows='10'></textarea>
      <a href="index.php">Menu</a>
        <input placeholder='Send' type='submit'>
      </form>
     
    </div>
  </div>
</div>

</body>
</html>