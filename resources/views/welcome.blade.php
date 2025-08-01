<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RAÍZ TAMALERA J&U</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    body {
      margin: 0;
      font-family: 'Playfair Display', serif;
      color: #fff;
    }

    header {
      background: url('https://i.pinimg.com/1200x/09/22/40/092240e3302979f0d72bba933fa0126f.jpg') no-repeat center center/cover;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      position: relative;
    }

    header::after {
      content: "";
      position: absolute;
      top: 0; left: 0; width: 100%; height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: 1;
    }

    header h1, header p {
      position: relative;
      z-index: 2;
    }

    header h1 {
      font-size: 3rem;
      margin: 0;
    }

    header p {
      font-size: 1.2rem;
      margin-top: 0.5rem;
    }

    section.sobre-nosotros {
      background-color: #7a1124;
      color: #fff8e1;
      padding: 60px 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      gap: 40px;
    }

    .sobre-nosotros .text {
      max-width: 500px;
      font-size: 1.1rem;
    }

    .sobre-nosotros img {
      max-width: 300px;
      border-radius: 10px;
    }

    section.galeria {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      background-color: #400910;
      padding: 20px 0;
    }

    .galeria img {
      height: 400px;
      width: 450px;
      object-fit: cover;
      margin: 0 20px;
      border-radius: 20px;
      flex-shrink: 0;
    }

    footer {
      background-color: #2b090d;
      color: #fff;
      text-align: center;
      padding: 20px;
    }

    .redes a {
      color: #fff;
      font-size: 1.5rem;
      margin: 0 10px;
      text-decoration: none;
    }

    .redes a:hover {
      color: #ffd700;
    }
  </style>
</head>
<body>
  <header>
    <h1>RAÍZ TAMALERA J&U</h1>
    <p>Somos la herencia del maíz</p>
  </header>

  <section class="sobre-nosotros">
    <div class="text">
      <h2>MÁS DE 40 SABORES ARTESANALES</h2>
      <p>En RAÍZ TAMALERA J&U creamos tamales que cuentan historias. Cada sabor nace de la fusión entre tradición e innovación. Descubre un universo de texturas, aromas y colores que celebran nuestras raíces mexicanas.</p>
    </div>
    <img src="https://i.pinimg.com/736x/5a/37/53/5a37531263df1d9c9dbf102e9264bf7f.jpg" alt="Tamal artesanal">
  </section>

  <section class="galeria">
    <img src="https://images.squarespace-cdn.com/content/v1/5e6e8257db71ea1629173026/1592322692880-67FDTCI2FSBB1L2VP7MB/IMG_3748+2.JPG?format=750w" alt="Tamal de frutas">
    <img src="https://images.squarespace-cdn.com/content/v1/5e6e8257db71ea1629173026/1592322736272-JCLVMTXDFONI0IV2ZVY5/PUERCO+2.JPG?format=750w" alt="Tamal de puerco">
    <img src="https://i.pinimg.com/1200x/79/0c/4a/790c4ab7d7e43baa01526da22da98c05.jpg" alt="Tamal de zarzamora">
  </section>

  <footer>
    <p>&copy; 2025 RAÍZ TAMALERA J&U | Todos los derechos reservados</p>

  </footer>
</body>
</html>
