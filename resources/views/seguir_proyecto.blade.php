<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>ElegArq-Inicio</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+52 2221347114</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>rbtvzq@gmail.com</small>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
            
                <h1 class="m-0 display-5  text-primary">ElegArq</h1>
        
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav m-auto py-0">
                    <a href="index" class="nav-item nav-link">Inicio</a>
                    <a href="about.html" class="nav-item nav-link">Cotización</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cátalogos</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="blog.html" class="dropdown-item">Materiales</a>
                            <a href="single.html" class="dropdown-item">Proveedores </a>
                        </div>
                    </div>
                    <a href="service.html" class="nav-item nav-link">Registro de Pagos</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Proyectos</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="seguir_proyecto" class="dropdown-item">Seguimiento de Proyectos</a>
                            <a href="registrar_proyecto" class="dropdown-item">Registro de Proyectos</a>
                        </div>
                    </div>
                    <div>
                    <a href="elaborar_cronograma" class="nav-item nav-link">Elaborar cronograma</a>
                    </div>
            
                </div>
               
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <div class="container mt-5">
        <!-- Inicio del formulario principal -->
        <h2 class="text-center">Seguir Proyecto</h2>
        <form>
            <tr>
                <!-- Etiqueta indicando la selección de proyectos disponibles -->
                <td>Números disponibles de proyectos</td>
                <!-- Menú desplegable para seleccionar un proyecto -->
                <td><select  class="form-select" name = 'idcot'>
                <!-- Iteración para listar los proyectos disponibles -->
                @foreach($proyecto as $cot)
                    <option value = '{{$cot->idcot}}'>{{$cot->idcot}}</option>
                @endforeach
	            </select>
	        </td></tr>

            <!-- Contenedor para mostrar el cronograma -->
            <div class="cont-principal">

            <!-- Formulario GET para buscar un proyecto específico -->
            <form method="GET" action="{{ route('seguir_proyecto') }}">
                <label for="idcot">Numero de Proyecto:</label>
                <input type="text" class="form-control" name="idcot" value="{{ request('idcot') }}">
            </form>
                <!-- Botón para buscar el cronograma -->
                <button type="submit" class="btn-buscar">Buscar</button>
        <!-- Tabla para mostrar el cronograma del proyecto -->
        <table id="tablaAvances">
    <thead>
        <!-- Encabezado de la tabla -->
        <tr>
            <th>Número de cotizacion</th>
            <th>Número de encargado</th>
            <th>Número de cronograma</th>
            <th>Fecha de inicio</th>
            <th>Fecha de termino</th>
            <th>Estatus</th>
        </tr>
    </thead>
    <!-- Cuerpo de la tabla con datos dinámicos -->
    <tbody>
        @foreach($sp as $a)
            <tr>
                <td>{{ $a->idcot }}</td>
                <td>{{ $a->idenc }}</td>
                <td>{{ $a->idcro }}</td>
                <td>{{ $a->fecha_inicio }}</td>
                <td>{{ $a->fecha_ter }}</td>
                <td>{{ $a->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<!-- Estilos personalizados -->
<style>
.cont-principal {
    margin: 20px;
    font-family: Arial, sans-serif;
}

form {
    margin-bottom: 20px;
}

.form-control {
    padding: 10px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn-buscar, .btn-impr {
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 5px;
}

.btn-buscar {
    background-color: #007bff;
    color: white;
}

.btn-impr {
    background-color: #28a745;
    color: white;
}

#tablaAvances {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

#tablaAvances th, #tablaAvances td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

#tablaAvances th {
    background-color: #f2f2f2;
    color: #333;
}

#tablaAvances tr:nth-child(even) {
    background-color: #f9f9f9;
}

#tablaAvances tr:hover {
    background-color: #f1f1f1;
}
</style>
<!-- Bloque para actualizar un cronograma -->
    <tr>
        <label for="idcro">Número de cronograma a actualizar</td>
        <td width=200>
        <input type = 'text' class="form-control" name='idcro' value="{{$idcro}}"></td>
    </tr>
        <div>
        @if('idcro')
            <td width=100>Estatus completado</td>
            <a href ="{{ route('completado',['idcro' => $idcro]) }}">
            <button type="button" class="btn btn-primary">COMPLETADO</button>
            </a>
            <td width=100>Estatus atrasado</td>
            <a href ="{{ route('atrasado',['idcro' => $idcro]) }}">
            <button type="button" class="btn btn-danger">ATRASADO</button>
            </a>
        @endif
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-7 col-md-6">
                <div class="row">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: #3E3E4E !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; <a href="#">Your Site Name</a>. All Rights Reserved. 
				
				<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
				Designed by <a href="https://htmlcodex.com">HTML Codex</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
