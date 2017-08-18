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
                        <td>Empresa</td>
                        <td>Vencimiento</td>
                        <td>Vistas</td>
                        <td>Encabezado</td>
                        <td>Imagen</td>
                    </tr>
                    <form action="/admin2055/editar_anu/{{$anuncio->id}}" method="post" enctype="multipart/form-data">
                        <tr>
                            <td style="width: 10%">                              
                                <select name="estado">
                                  @if($anuncio->estado == 'A')
                                    <option value="A" selected>Activo</option>
                                    <option value="I">Inactivo</option>
                                  @elseif($anuncio->estado == 'I')
                                    <option value="A">Activo</option>
                                    <option value="I" selected>Inactivo</option>
                                  @endif
                                </select>                            
                            </td>
                            <td style="width: 5%">
                                <select name="destacado" >
                                  @if($anuncio->destacado == 'S')
                                    <option value="S" selected>SI</option>
                                    <option value="N">NO</option>
                                  @elseif($anuncio->destacado == 'N')
                                    <option value="S">SI</option>
                                    <option value="N" selected>NO</option>
                                  @endif
                                </select>
                            </td>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <td style="width: 12%"><input type="text" name="cod_cat" value="{{$anuncio->cod_cat}}" readonly></td>
                            <td style="width: 15%;"><input type="text" name="cod_emp" value="{{$anuncio->cod_emp}}" readonly></td>
                            <td style="width: 12%">
                                <input type="text" id="datepicker" class="form-control border-input" required name="duracion" placeholder="Día/Mes/Año" value="{{$anuncio->duracion}}" readonly style="background: white">
                            </td>
                            <td style="width: 7%"><input type="text" name="vistas" value="{{$anuncio->vistas}}"></td>
                            <td><input type="text" name="encabezado" value="{{$anuncio->encabezado}}"></td>
                            <td>
                                <label class="custom-file-upload" >
                                    <input type="file" id="upfile" name="imagen" />
                                    <img class="avatar border-white" id="imagen" style="width: 64px" src="/{{$anuncio->imagen}}" alt="..."/>
                                </label>
                            </td>
                        </tr>                    
                </table>                    
                    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
                    <textarea class="ckeditor" placeholder="Escribe el texto aquí..." name="texto" id="editor1" rows="12">{{$anuncio->texto}}</textarea>
                    </br><input type="submit" name="enviar" value="Editar">
                </form>
            </section>
        </div>        
    </div>
@endsection

<script src="/assets/js/jquery-1.10.2.js" type="text/javascript"></script>