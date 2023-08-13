<nav class="navbar navbar-main navbar-expand-lg px-0  shadow-none border-radius-xl" id="" navbar-scroll="true" style="background-color:#111927;">
      <div class="container-fluid">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav">
            <style>
              .bg{
                color: #A4B1CD;
                font-size:11px;
                margin-right:5px;
                padding:6px;
                border: 1px solid #A4B1CD;
                border-radius:5px;
                background-color:#111927;
                font-weight:600;
                text-transform: uppercase;
                align-items: center;
                justify-content: center;
              }
              .bg:hover{
                color: #9fef00;
                border: 1px solid #9fef00;
              }
              
            </style>
            <div class="d-flex">
                <div class="d-flex" data-bs-toggle="modal" data-bs-target="#modal-calificacion" href="#" role="tab" aria-selected="false">
                  <button class="bg">
                    <span style="font-size:13px;">+ </span> CALIFICACION
                  </button>
                </div>

                <div class="d-flex" class="d-flex" data-bs-toggle="modal" data-bs-target="#modal-categoria" href="#" role="tab" aria-selected="false">
                  <button class="bg">
                    <span style="font-size:13px;">+ </span> CATEGORIA
                  </button>
                </div>
 
            </div>
            <!---Modal Calificacion--->
            <div class="modal" tabindex="-1" id="modal-calificacion">
              <div class="modal-dialog">
                <div class="modal-content" style="background-color:#1A2332;">
                  <div class="modal-body">
                    <div class="row align-items-center justify-content-center"> <!-- Añadimos "justify-content-center" -->
                          <div class="row my-4">
                              <h5 class="modal-title text-center" style="color:#FFF; font-size:20px; letter-spacing:1px;">Genera una Nueva Calificacion</h5>
                          </div>
                          <form id="form_calificacion" class="row">
                              <input name="cali" hidden type="text" value="1">
                              <div class="col-md-12 mt-2" id="div_calificacion"></div>
                              <div class="col-lg-12 mt-4 text-center">
                                  <button type="button" class="btn" data-bs-dismiss="modal" style="background: linear-gradient(#DF272B20, #DF272B20); color:#DF272B; font-size:13px; letter-spacing:1px; font-weight:800; margin-right:5px;">Cancelar</button>
                                  <button type="submit" class="btn" style="background: linear-gradient(#9FEF0020, #9FEF0020); color:#9FEF00; font-size:13px; letter-spacing:1px; font-weight:800;">Generar</button>
                              </div>
                          </form>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <!---Modal Categoria--->
            <div class="modal" tabindex="-1" id="modal-categoria">
              <div class="modal-dialog">
                <div class="modal-content" style="background-color:#1A2332;">
                  <div class="modal-body">
                    <div class="row align-items-center justify-content-center"> <!-- Añadimos "justify-content-center" -->
                          <div class="row my-4">
                              <h5 class="modal-title text-center" style="color:#FFF; font-size:20px; letter-spacing:1px;">Añade Nueva Categoria</h5>
                          </div>
                          <form id="form_categoria" class="row">
                              <input name="categoria" class="form-control text-center bg-input" type="text">
                              <div class="col-md-12 mt-2" id="div_categoria"></div>
                              <div class="col-lg-12 mt-4 text-center">
                                  <button type="button" class="btn" data-bs-dismiss="modal" style="background: linear-gradient(#DF272B20, #DF272B20); color:#DF272B; font-size:13px; letter-spacing:1px; font-weight:800; margin-right:5px;">Cancelar</button>
                                  <button type="submit" class="btn" style="background: linear-gradient(#9FEF0020, #9FEF0020); color:#9FEF00; font-size:13px; letter-spacing:1px; font-weight:800;">Añadir</button>
                              </div>
                          </form>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </ul>
        </div>
      </div>
      
</nav>