  <title>Sistema de Gestión Notarial</title>
  <meta name="description" content="sistema de gestion notarial" />
  <meta name="keywords" content="sistema,gestion,notarial,documentos,juridicos" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />

</head>
<?php
     $el_usuario = $this->session->all_userdata();
?>
<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <h1>GIRASOL</h1>
        <div class="slogan">Sistema de Gesti&oacute;n Notarial</div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="current" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="index">Inicio</a></li>
          <li class="current"><a href="personas">Personas</a></li>
          <li><a href="gestiones">Gestiones</a></li>
          <li><a href="tramites">Trámites</a></li>
          <li><a href="plantillas">Plantillas</a></li>
          <!--li><a href="another_page_test.php">Another Page</a></li-->
          <li><a href="logout">Salir</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="sidebar_container">
        <img class="paperclip" src="<?=APPPATH?>static/images/paperclip.png" alt="paperclip" />
        <div class="sidebar">
            <!-- insert your sidebar items here -->
            <img style="margin-top: 10px;" class="float-right" src="<?=APPPATH?>static/images/admin.jpg" alt="admin picture" />
            <h3>Hola <?php echo $el_usuario['nombre'];?></h3> 
            <br/>
            <p style="padding-bottom: 0px;">
                Usuario: <em><?php echo $el_usuario['nombre'].' '.$el_usuario['apellido'];?></em>
            <br/>
                E-mail: <em><?php echo $el_usuario['email'];?></em>
            <br/>
                Rol: <em><?php if($el_usuario['rol']==1){echo 'Administrador';} else{if($el_usuario['rol']==2){echo 'Editor';}};?></em>
            </p>
            <a href="logout" class="btn btn-warning btn-xs float-right">Salir</a>
        </div>
        <img class="paperclip" src="<?=APPPATH?>static/images/paperclip.png" alt="paperclip" />
        <div class="sidebar">
          <h3>Newsletter</h3>
          <p>If you would like to receive our newletter, please enter your email address and click 'Subscribe'.</p>
          <form method="post" action="#" id="subscribe">
            <p style="padding: 0 0 9px 0;"><input class="search" type="text" name="email_address" value="your email address" onclick="javascript: document.forms['subscribe'].email_address.value=''" /></p>
            <p><input class="subscribe" name="subscribe" type="submit" value="Subscribe" /></p>
          </form>
        </div>
        <img class="paperclip" src="<?=APPPATH?>static/images/paperclip.png" alt="paperclip" />
        <div class="sidebar">
          <h3>Latest Blog</h3>
          <h4>Website Goes Live</h4>
          <h5>1st July 2011</h5>
          <p>We have just launched our new website. Take a look around, we'd love to know what you think.....<br /><a href="#">read more</a></p>
        </div>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Clientes</h1>
        <button id="btn_agregar_cliente" type="button" class="btn btn-primary">Agregar cliente <i class="fa fa-plus-circle"></i></button>
        <button id="btn_mostrar_lista_clientes" type="button" style="display: none;" class="btn btn-primary">Mostrar Lista <i class="fa fa-list"></i></button>        
        <div id="retorno_borrado"></div><div id="div_ci_cliente"></div>
        
        <select class="form-control float-right" id="combo_lista_personas_personas">
            <option value="1">Todos</option>
            <option value="2">Clientes</option>
            <option value="3">Participantes</option>
        </select>
        
        <div id="div_formulario_cliente">
            <h3>Datos del cliente</h3>           
            <div class="form-group">
                <label for="txt_nombre_cliente">Nombre</label>
                <input type="text" class="form-control" id="txt_nombre_cliente" placeholder="Ingresar Nombre">                
            </div>
            <div class="form-group">
                <label for="txt_apellido_cliente">Apellido</label>
                <input enabled="false" type="text" class="form-control" id="txt_apellido_cliente" placeholder="Ingresar Apellido">                
            </div>
            <div class="form-group">                
                <label for="txt_ci_cliente">Cédula de Identidad</label><br />
                <input type="text" class="form-control" id="txt_ci_cliente" placeholder="Ingresar Céldula">    
                <button type="button" id="btn_agregar_form_subir_ci" class="btn btn-info">Agregar cédula <i class="fa fa-upload"></i></button>                
            </div>  
            <!--div class="form-group" id="div_formulario_subir_ci"-->
            <form enctype="multipart/form-data" class="formulario_archivo" id="div_formulario_subir_ci">
                    <label for="input_file_cedula">Cédula</label>
                    <input type="file" class="archivo" id="input_file_cedula" name="input_file_cedula">
                    <p class="help-block retorno_del_file_agregar_elemento">Agregar cédula de identidad.</p>
                    <button type="button" class="subir_archivo btn btn-info btn-sm">Subir cédula</button> 
            </form>
            <div class="mostrarCI"></div>
            <!--/div-->
            <div class="form-group">
                <label for="txt_email_cliente">Email</label>                
                <input type="email" class="form-control" id="txt_email_cliente" placeholder="E-mail">
            </div>
            
            <div class="form-group">
                <label for="txt_telefono_cliente">Teléfono</label>
                <input type="text" class="form-control" id="txt_telefono_cliente" placeholder="Ingresar Teléfono">                
            </div>
            <div class="form-group">
                <label for="txt_direccion_cliente">Dirección</label>
                <input type="text" class="form-control" id="txt_direccion_cliente" placeholder="Ingresar Dirección">                
            </div>  
            <div class="button-group">
                <button type="button" class="btn btn-success" id="btn_guardar">Guardar <i class="fa fa-floppy-o"></i></button><div id="retorno_ajax"></div>
            </div>  
        </div>
        <br/>
        <div id="div_formulario_adjuntos_cliente">
            <div id="div_form_agregar_adjunto_persona">
            <h3><em>Adjuntos</em></h3>
            <h3 id="nombre_cliente_adjunto">Nombre del cliente</h3>
            <form enctype="multipart/form-data" class="formulario_archivo_para_adjunto" id="div_formulario_subir_adjunto">
                    <br />
                    <label>Nombre del ajunto: </label>
                    <input type="text" class="form-control" id="txt_nombre_adjunto" name="txt_nombre_adjunto" placeholder="Nombre del adjunto"><br/><br/> 
                    <label for="input_file_cedula">Adjunto</label>
                    <input type="file" class="archivo" id="input_file_adjunto" name="input_file_adjunto">
                    <p class="help-block retorno_del_file_agregar_elemento_adjunto">Agregar adjunto del cliente.</p>
                    <button type="button" class="subir_archivo_adjunto_cliente btn btn-info btn-sm">Subir adjunto</button> 
            </form>
            </div>
            <br/>
            <hr/>
            <br/>
            <div id="dialog_adjunto_del_cliente" title="Archivo adjunto" style="display:none;"></div>
            <div id="div_listado_adjuntos_total_del_cliente">
                <div id="div_no_hay_adjuntos_del_cliente">
                    <h3> - No hay adjuntos - </h3>
                </div>
                <div id="div_archivos_adjuntos">
                    <h3>Lista de adjuntos</h3>
                    <table class="table table-hover" >
                        <thead><tr><th>#</th><th>Nombre de ajunto</th><th>Acciones</th></tr></thead>
                        <tbody id="div_listado_adjuntos_de_un_cliente"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="div_listado_cliente">            
        </div>
      </div>
    </div>
    <div id="footer">
      <p>Copyright &copy; Girasol | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a></p>
    </div>
  </div>
</body>
</html>
