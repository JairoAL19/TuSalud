@extends('app_admin')

@section('htmlheader_title')
    Home
@endsection

@section('main-content')
    <div id="main">
        <div class="inner">
            <header id="header">
                <a href="/" class="logo"><strong>Tu Salud</strong> .com.pe</a>
                <ul class="icons">
                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
                    <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
                </ul>
            </header>
            <style> 
            input[type="file"] {
                display: none;
            }
            .avatar_top {
                border-radius: 50%;
                max-height: 50px;
                max-width: 50px;
            }
            </style>
            <link rel="stylesheet" href="/css/jquery-ui.css" />
            <script>
                    $(window).load(function(){

                     $(function() {
                      $('#upfile').change(function(e) {
                          addImage(e); 
                         });

                         function addImage(e){
                          var file = e.target.files[0],
                          imageType = /image.*/;
                        
                          if (!file.type.match(imageType))
                           return;
                      
                          var reader = new FileReader();
                          reader.onload = fileOnload;
                          reader.readAsDataURL(file);
                         }
                      
                         function fileOnload(e) {
                          var result=e.target.result;
                          $('#imagen').attr("src",result);
                         }
                        });
                  });

                   $( function() {
                        $( "#datepicker" ).datepicker({
                           maxDate: '+24m',
                           minDate: '+0d',
                           dateFormat: 'dd/mm/yy',
                           constrainInput: true,
                        });
                  });
            </script>
            <section id="banner" style="padding: 0px">
                @include('partials.navbar_anuncios')                
            </section>
            <section style="padding: 0px">
                <table>
                    <tr>
                        <td>Estado</td>
                        <td>Destacado</td>
                        <td>Categoría</td>
                        <td>SubCategoría</td>
                        <td>Empresa</td>
                        <td>Vencimiento</td>
                        <td>Vistas</td>
                        <td>Encabezado</td>
                        <td>Imagen</td>
                    </tr>
                    <form action="/admin2055/anuncios/crear" method="post" enctype="multipart/form-data">
                        <tr>
                            <td style="width: 10%">
                                <select name="estado">
                                    <option value="A">Activo</option>
                                    <option value="I">Inactivo</option>
                                </select>
                            </td>
                            <td style="width: 5%">
                                <select name="destacado" >
                                    <option value="S">SI</option>
                                    <option value="N">NO</option>
                                </select>
                            </td>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <td style="width: 12%">
                                <select name="cod_cat">
                                    @foreach($categorias as $categoria)
                                        <option value="{{$categoria->cod_cat}}">{{$categoria->nombre}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="width: 12%">
                                <select name="cod_subcat">
                                    <option selected>No</option>
                                    @foreach($subcategorias as $subcategoria)
                                        <option value="{{$subcategoria->cod_subcat}}">{{$subcategoria->cod_cat}} >> {{$subcategoria->nombre}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="width: 15%">
                                <select name="cod_emp">
                                    @foreach($empresas as $empresa)
                                        <option value="{{$empresa->cod_emp}}">{{$empresa->nombre}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="width: 12%">
                                <input type="text" id="datepicker" class="form-control border-input" required name="duracion" placeholder="Día/Mes/Año" readonly style="background: white">
                            </td>
                            <td style="width: 7%"><input type="text" name="vistas" value="0"></td>
                            <td><input type="text" name="encabezado"></td>
                            <td>
                                <label class="custom-file-upload" >
                                    <input type="file" id="upfile" name="imagen" />
                                    <img class="avatar border-white" id="imagen" style="width: 64px" src="/images/vacio.jpg" alt="..."/>
                                </label>
                            </td>
                        </tr>                    
                </table>                    
                    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
                    <textarea class="ckeditor" placeholder="Escribe el texto aquí..." name="texto" id="editor1" rows="12"></textarea>
                    </br><input type="submit" name="enviar" value="Crear">
                </form>
            </section>
        </div>        
    </div>
@endsection

<script src="/assets/js/jquery-1.10.2.js" type="text/javascript"></script>