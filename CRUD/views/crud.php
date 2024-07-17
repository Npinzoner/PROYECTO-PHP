<?php
include '../Controllers/CrudControllers.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Raspa Todo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="../imgs/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/styles.css">

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../js/update.js"></script>
</head>

<body>

  <!-- Fondo -->
  <div class="fondo-crud">

    <!-- header -->
    <div class="row g-0 justify-content-between py-3 linea">

      <!-- BOTON MENU MOVIL -->
      <div class="col-2 col-sm-1 align-self-center text-start menu_small">
        <button type="button" class="btn btn-link" data-bs-toggle="offcanvas" data-bs-target="#menu" aria-controls="menu">
          <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#ffffff">
            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
          </svg> </button>
      </div>

      <!-- LOGO MOVIL -->
      <div class="col-9 col-sm-9 text-end pe-2 menu_small">
        <a class="" href="#">
          <img src="../imgs/logo.png" alt="Raspa todo" class="logo">
        </a>
      </div>

      <!-- MENU MOVIL -->
      <div class="offcanvas offcanvas-start fondo" data-bs-scroll="true" tabindex="-1" id="menu" aria-labelledby="menu">
        <div class="offcanvas-header mb-4 linea">
          <img src="../imgs/logo.png" alt="Raspa todo" width="100%" height="108" data-bs-dismiss="offcanvas">
        </div>
        <div class="row g-0 altu-menu text-start">
          <div class="col-12">
            <div class="px-3">
              <ul class="nav flex-column" data-bs-dismiss="offcanvas">
                <li class="nav-item mano mb-3">
                  <a class="line-none fw-6 c-white h6" href='home.html'>INICIO</a>
                </li>
                <li class="nav-item mano mb-3">
                  <a class="line-none fw-6 c-white h6">NUESTROS JUEGOS</a>
                </li>
                <li class="nav-item mano mb-3">
                  <a class="line-none fw-6 c-white h6">DÓNDE JUGAR</a>
                </li>
                <li class="nav-item mano mb-3">
                  <a class="line-none fw-6 c-white h6">TIQUETES NO PARTICIPANTES</a>
                </li>
                <li class="nav-item mano mb-3">
                  <a class="line-none fw-6 c-white h6">BLOG</a>
                </li>
                <li class="nav-item mano mb-3">
                  <a class="line-none fw-6 c-white h6">QUIÉNES SOMOS</a>
                </li>
                <li class="nav-item mano mb-3">
                  <a class="line-none fw-6 c-white h6">JUEGA</a>
                  <hr class="m-0 desing-barra-menu">
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- LOGO NO MOVIL -->
      <div class="col-3 text-center menu_big">
        <a class="" href="#">
          <img src="../imgs/logo.png" alt="Raspa todo" class="logo">
        </a>
      </div>

      <!-- MENU NO MOVIL -->
      <div class="col-9 align-self-center text-center menu_big">
        <ul class="nav justify-content-evenly">
          <li class="nav-item">
            <a class="line-none fw-6 c-white h6 mano" href='home.html'>INICIO</a>
          </li>
          <li class="nav-item">
            <a class="line-none fw-6 c-white h6 mano">NUESTROS<br>JUEGOS</a>
          </li>
          <li class="nav-item">
            <a class="line-none fw-6 c-white h6 mano">DÓNDE JUGAR</a>
          </li>
          <li class="nav-item">
            <a class="line-none fw-6 c-white h6 mano">TIQUETES NO<br>PARTICIPANTES</a>
          </li>
          <li class="nav-item">
            <a class="line-none fw-6 c-white h6 mano">BLOG</a>
          </li>
          <li class="nav-item">
            <a class="line-none fw-6 c-white h6 mano">QUIÉNES SOMOS</a>
          </li>
          <li class="nav-item">
            <a class="line-none fw-6 c-white h6 mano">JUEGA</a>
            <hr class="m-0 desing-barra-menu">
          </li>
        </ul>
      </div>
    </div>

    <!--body-->
    <div class="row g-o justify-content-center w-100 mt-2">
      <div class="col-11 p-2">
        <div class="table-responsive">
          <div class="row g-0 mb-3 px-2">
            <div class="col-10 h2 m-0 c-white">Lista de Data</div>
            <!-- modal -->
            <div class="col-2 text-end align-content-center">
              <button type='button' class="btn btn-light btn-sm fw-6" data-bs-toggle="modal" data-bs-target="#createModal">
                Agregar
              </button>
            </div>
          </div>

          <table class="table table-hover">
            <thead class="table-dark">
              <tr>
                <th>Id</th>
                <th>Juego</th>
                <th>Número</th>
                <th>Ciudad</th>
                <th>Apuesta</th>
                <th class="text-center">Opciones</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <?php if (empty($data)) : ?>
                <tr>
                  <td colspan="12" class="text-center fw-6 h5">No hay datos para mostrar</td>
                </tr>
              <?php else : ?>
                <?php foreach ($data as $item) : ?>
                  <tr>
                    <td><?php echo htmlspecialchars($item['id']); ?></td>
                    <td><?php echo htmlspecialchars($item['game']); ?></td>
                    <td><?php echo htmlspecialchars($item['number']); ?></td>
                    <td><?php echo htmlspecialchars($item['city']); ?></td>
                    <td><?php echo htmlspecialchars($item['bet']); ?></td>
                    <td class="text-center">
                      <div class="row g-0">
                        <div class="col-6">
                          <form method="POST" action="crud.php" style="display:inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>">
                            <button type="submit" class="mano" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')" style="border: none; background: none;">
                              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323">
                                <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                              </svg>
                            </button>
                          </form>
                        </div>
                        <div class="col-6">
                          <button type="button" class="edit-btn mano" style="border: none; background: none;" data-toggle="modal" data-target="#editModal" data-id="<?php echo htmlspecialchars($item['id']); ?>" data-game="<?php echo htmlspecialchars($item['game']); ?>" data-number="<?php echo htmlspecialchars($item['number']); ?>" data-city="<?php echo htmlspecialchars($item['city']); ?>" data-bet="<?php echo htmlspecialchars($item['bet']); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                              <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 fw-7" id="createModalLabel">Agrega Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method='POST' action='crud.php'>
            <div class="modal-body">
              <input type='hidden' name='action' value='create'>
              <div class="row g-0 justify-content-between">
                <div class="col-5 mb-3">
                  <label for="game" class="form-label">Juego</label>
                  <input type="text" class="form-control" id="game" name="game" required>
                </div>
                <div class="col-5 mb-3">
                  <label for="number" class="form-label">Número</label>
                  <input type="text" class="form-control" id="number" name="number" required>
                </div>
                <div class="col-5 mb-3">
                  <label for="city" class="form-label">Ciudad</label>
                  <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="col-5 mb-3">
                  <label for="bet" class="form-label">Apuesta</label>
                  <input type="number" class="form-control" id="bet" name="bet" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Update -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 fw-7" id="editModalLabel">Editar Data</h1>
            <button type="button" class="btn-close" data-dismiss="modal"></button>
          </div>
          <form method="POST" action="crud.php">
            <div class="modal-body">
              <input type="hidden" name="action" value="edit">
              <input type="hidden" name="id" id="edit-id">
              <div class="row g-0 justify-content-between">
                <div class="col-5 mb-3">
                  <label for="game" class="form-label">Juego</label>
                  <input type="text" class="form-control" id="edit-game" name="game" required>
                </div>
                <div class="col-5 mb-3">
                  <label for="number" class="form-label">Número</label>
                  <input type="text" class="form-control" id="edit-number" name="number" required>
                </div>
                <div class="col-5 mb-3">
                  <label for="city" class="form-label">Ciudad</label>
                  <input type="text" class="form-control" id="edit-city" name="city" required>
                </div>
                <div class="col-5 mb-3">
                  <label for="bet" class="form-label">Apuesta</label>
                  <input type="number" class="form-control" id="edit-bet" name="bet" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

  <!-- footer -->
  <div class="row g-0 justify-content-center bg-obsidian pt-4 pb-2 delete-linea">
    <div class="col-8 col-sm-9 col-md-4 col-lg-4 mb-3">
      <div class="fw-6 c-angelic h6">POLÍTICAS</div>
      <div class="fw-6 c-white h6">¿Quiénes somos?</div>
      <div class="fw-6 c-white h6">Red de comercialización</div>
      <div class="fw-6 c-white h6">Preguntas frecuentes</div>
      <div class="fw-6 c-white h6">Normatividad</div>
      <div class="fw-6 c-white h6">Política de protección de datos</div>
    </div>
    <div class="col-8 col-sm-5 col-md-3 col-lg-3 mb-3">
      <div class="fw-6 c-angelic h6">CONTACTO</div>
      <div class="fw-6 c-white h6 m-0">PBX: 300 910 84 73</div>
    </div>
    <div class="col-8 col-sm-4 col-md-4 col-lg-3">
      <div class="fw-6 c-angelic h6">SÍGUENOS EN</div>
      <img src="../imgs/redes.png" alt="img1" class="logo-footer">
    </div>
    <div class="col-11 text-center">
      <img src="../imgs/footer.png" alt="footer" class="img-footer">
    </div>
  </div>

</body>

</html>