  <title>Sistema de Gestión Notarial</title>
  <meta name="description" content="sistema de gestion notarial" />
  <meta name="keywords" content="sistema,gestion,notarial,documentos,juridicos" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />

</head>

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
          <li><a href="clientes">Clientes</a></li>
          <li class="current"><a href="gestiones">Gestiones</a></li>
          <li><a href="tramites">Trámites</a></li>
          <li><a href="plantillas">Plantillas</a></li>
          <!--li><a href="another_page_test.php">Another Page</a></li-->
          <li><a href="contact_test.php">Contact Us</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="sidebar_container">
        <img class="paperclip" src="<?=APPPATH?>static/images/paperclip.png" alt="paperclip" />
        <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3>Latest News</h3>
        <h4>What's the News?</h4>
        <h5>1st July 2011</h5>
        <p>Put your latest news item here, or anything else you would like in the sidebar!<br /><a href="#">Read more</a></p>
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
        <h1>Gestiones</h1>
        <button id="btn_agregar_gestion" type="button" class="btn btn-primary">Agregar nueva <i class="fa fa-plus-circle"></i></button>
        <button id="btn_mostrar_lista_gestiones" type="button" style="display: none;" class="btn btn-primary">Mostrar Lista <i class="fa fa-list"></i></button>        
        <div id="retorno_borrado"></div><div id="div_ci_cliente"></div>
        
        
        <div id="div_formulario_gestion">
            <h3>Datos de gestión</h3>
            <div class="form-group">
                <label for="txt_descripcion_gestion">Descripción</label>
                <input type="text" class="form-control" id="txt_descripcion_gestion" placeholder="Ingresar Descripción">                
            </div>
            
            <div class="form-group">
                <label for="lbl_tipo_gestion">Tipo de gestión</label>  <br />              
                <select class='form-control' id='combo_tipo_gestion'>
                    <option>No se cargaron las opcione</option>
                </select>
            </div> 
            <div class="form-group fecha fecha-inicio-gestion">                
                <label for="lbl_fecha_inicio">Fecha de inicio</label><br />
                <input type="text" class="form-control datepicker" id="txt_fecha_inicio_gestion" placeholder="Fecha de inicio">    
                            
            </div>  
            <div class="form-group fecha fecha-fin-gestion">
                <label for="lbl_fecha_fin">Fecha de finalización</label><br/>            
                <input type="text" class="form-control datepicker" id="txt_fecha_fin_gestion" placeholder="Fecha de finalizacion">
            </div>
            <br/><br/><br/><br/><br/>
            <div class="form-group" id="div_estado_gestion">
                <label for="lbl_esado_tramite">Estado</label> <br/>
                <button id="btn_finalizar_gestion" type="button" class="btn btn-primary btn-xs" value="1">Finalizar</button>
                </select>                
            </div><br/>    
            <div id="selectores_grupo_clientes">
                <div class="form-group float-left">
                    <label for="lbl_lista_clientes">Seleccionar grupo</label>  <br />              
                    <select multiple="5" class="form-control select_sumar_quitar_cliente" id='combo_lista_personas'>
                        <option>No se cargaron las opcione</option>
                    </select>
                </div> 

                <div class="form-group float-left">
                    <br/>
                    <button type="button" class="btn btn-primary btn-sm btn_sumar_quitar_cliente" id="btn_agregar_cliente_a_grupo"><i class="fa fa-arrow-right"></i></button>
                    <br/>
                    <button type="button" class="btn btn-primary btn-sm btn_sumar_quitar_cliente" id="btn_quitar_cliente_a_grupo"><i class="fa fa-arrow-left"></i></button>
               </div>

                <div class="form-group float-left">
                    <label for="lbl_lista_clientes">Clientes elegidos</label>  <br />              
                    <select multiple="5" class="form-control select_sumar_quitar_cliente" id='combo_lista_clientes_elegidos'>
                        <option value="-1">No hay clientes elegidos</option>
                    </select>
                </div>
            </div><br/><br/>
            
            <div id="selectores_grupo_participantes">
                <div class="form-group float-left">
                    <label for="lbl_lista_clientes">Seleccionar grupo de participantes</label>  <br />              
                    <select multiple="5" class="form-control select_sumar_quitar_participante" id='combo_lista_personas2'>
                        <option>No se cargaron las opcione</option>
                    </select>
                </div> 
                
                <div class="form-group float-left">
                    <br/>
                    <button type="button" class="btn btn-primary btn-sm btn_sumar_quitar_participante" id="btn_agregar_participante_a_grupo"><i class="fa fa-arrow-right"></i></button>
                    <br/>
                    <button type="button" class="btn btn-primary btn-sm btn_sumar_quitar_participante" id="btn_quitar_participante_a_grupo"><i class="fa fa-arrow-left"></i></button>
               </div>

                <div class="form-group float-left">
                    <label for="lbl_lista_clientes">Participantes elegidos</label>  <br />              
                    <select multiple="5" class="form-control select_sumar_quitar_cliente" id='combo_lista_participantes_elegidos'>
                        <option value="-1">No hay clientes elegidos</option>
                    </select>
                </div>
            </div>
            
            <div class="button-group">
                <button type="button" class="btn btn-success" id="btn_guardar_gestion">Guardar <i class="fa fa-floppy-o"></i></button><div id="retorno_ajax"></div>
            </div>
            <div id="div_listado_tramites_de_gestion_vacio">
                    <h3> - No hay trámites - </h3>
            </div>
            <div id="div_listado_tramites_de_gestion_contenedor">
                <h3>Lista de trámites</h3>
                <table class="table table-hover"><thead><tr><th>#</th><th>Descripcion</th><th>Tipo de Trámite</th><th>Fecha Inicio</th><th>Fecha Finalizado</th><th>Acciones</th></tr></thead><tbody id="listado_tramites_de_gestion"></tbody></table>
            </div>  
        </div>
        <div id="div_listado_gestion">            
        </div>      
    </div>
    <div id="footer">
      <p>Copyright &copy; Girasol | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">design from HTML5webtemplates.co.uk</a></p>
    </div>
  </div>
  </div>
</body>
</html>
