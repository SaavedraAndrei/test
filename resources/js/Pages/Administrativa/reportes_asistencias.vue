<template>
  <layout ref="layout">
    <div slot="c_ponentes_admin">
      <div class="content" style="display: block">
        <div class="card">
          <div class="card-header">
            <strong>REPORTE DE ASISTENCIAS</strong>
          </div>
          <!-- <div class="card-title">PANEL DE PREGUNTAS</div> -->
          <div class="card-body card-block">
            <!-- <div class="text-center mb-2">
              <button
                class="btn btn-action btn-icon-split"
                id="btnRegistrarAsistencia"
                @click="NuevoPonente()"
              >
                <span class="icon text-white">
                  <i class="far fa-id-badge"></i>
                </span>
                <span class="text font-size-layout">Agregar ponente</span>
              </button>
            </div> -->

            <div id="search-content_us">
              <div
                class="input-group row col-md-3 mb-1 input-search"
                id="s_content_us"
              >
                <input
                  class="form-control"
                  type="text"
                  id="inpBuscar"
                  placeholder="Buscar..."
                  @focus="hidenav()"
                  @blur="shownav()"
                />
                <div class="input-group-append">
                  <button class="btn btn-action" type="button">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
            <div id="tabla_permisos">
              <table class="table table-hover" id="tblPonentes">
                <thead>
                  <tr>
                    <!-- <th>EDITAR</th> -->
                    <th>DNI</th>
                    <th>NOMBRES</th>
                    <th>EMAIL</th>
                    <th>FECHA_HORA</th>
                    <th>ASISTIÓ</th>
                    <th>CONFERENCIA</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="asistencia in asistencias" :key="asistencia.id">
                    <!-- <td class="table-bordered" align="center">
                      <button
                        class="btn btn-action btn-icon-split"
                        @click="EditarPonente(ponente)"
                      >
                        <span class="icon text-white-50">
                          <i class="fas fa-edit" style="color: white"></i>
                        </span>
                      </button>
                    </td> -->
                    <td class="table-bordered" align="center">
                      {{ asistencia.dni }}
                    </td>
                    <td class="table-bordered" align="center">
                      {{
                        asistencia.nombres +
                        " " +
                        asistencia.apellidoPaterno +
                        " " +
                        asistencia.apellidoMaterno
                      }}
                    </td>
                    <td class="table-bordered" align="center">
                      {{ asistencia.email }}
                    </td>
                    <td class="table-bordered" align="center">
                      {{ asistencia.fecha_hora }}
                    </td>
                    <td class="table-bordered" align="center">
                      {{ asistencia.asistio == 1 ? "SI":"NO" }}
                    </td>
                    <td class="table-bordered" align="left">
                      {{ asistencia.nombre_evento }}
                    </td>
                    
                  </tr>
                </tbody>
              </table>
            </div>
            <br />
          </div>
        </div>

      
      </div>
    </div>
  </layout>
</template>

<script>
import { required } from "vuelidate/lib/validators";
import layout from "./Components/layout_administrativa";
const ThanZero = (value) => value > 0;
export default {
  components: { layout },
  props: {
    asistencias: Array,
  },
  data() {
    return {
      submited: false,
      title_modal: "NUEVO PONENTE",
      listar_ponentes: this.ponentes,
      frmRegistrarPonente: {
        id: "",
        nombre: "",
        apellidoPaterno: "",
        apellidoMaterno: "",
        email: "",
        descripcion: "",
        dni: null,
        telefono: null,
        modal: "",
        fotoPonente: null,
      },
    };
  },
  validations() {
    if (this.frmRegistrarPonente.modal == "NUEVO") {
      return {
        frmRegistrarPonente: {
          nombre: { required },
          apellidoPaterno: { required },
          apellidoMaterno: { required },
          email: { required },
          descripcion: { required },
          dni: { required },
          telefono: { required },
          fotoPonente: { required },
        },
      };
    }
  },
  mounted() {
    this.TablaPonentes();
    if (screen.width < 1000) {
      document.getElementById("tblPonentes").classList.add("table-responsive");
    }
  },
  watch:{ 
    // listar_ponentes() {
    //   $("#t_estados").DataTable().destroy();
    //   this.TablaPonentes();
    // },
  },
  methods: {
    TablaPonentes() {
      this.$nextTick(() => {
        var table = $("#tblPonentes").DataTable({
          destroy: true,
          // pageLength: 5,
          scrollCollapse: true,
          fixedHeader: true,
          language: {
            retrieve: true,
            decimal: "",
            emptyTable: "No hay datos disponibles en la tabla",
            info: "Mostrando del _START_ al _END_ de _TOTAL_ registros",
            infoEmpty: "No se encontraron registros",
            infoFiltered: "(filtrado de _MAX_ registros)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Agrupar por _MENU_ filas",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "No se encontraron registros",
            paginate: {
              first: "Primera",
              last: "Ultima",
              next: '<i class="fas fa-chevron-circle-right" style="font-size:20px;"></i>',
              previous:
                '<i class="fas fa-chevron-circle-left" style="font-size:20px;"></i>',
            },
            aria: {
              sortAscending: ": activar para ordenar de forma ascendente",
              sortDescending: ": activar para ordenar de forma descendente",
            },
          },
          responsive: true,
          dom: '<"top"Bf>rt<"row"<"col-sm-12 col-md-5 mb-2"i><"col-sm-12 col-md-7 mb-2"p><"col-sm-12 col-md-5 mb-2"l>><"clear">',
          buttons: [
            {
              extend: "excelHtml5",
              text: '<i class="fas fa-file-excel"></i> ',
              titleAttr: "Exportar a Excel",
              className: "btn btn-action",
            },
            {
              extend: "pdfHtml5",
              text: '<i class="fas fa-file-pdf"></i> ',
              titleAttr: "Exportar a PDF",
              className: "btn btn-cancel",
            },
            {
              extend: "print",
              text: '<i class="fa fa-print"></i> ',
              titleAttr: "Imprimir",
              className: "btn btn-action",
            },
          ],
        });
        $("#inpBuscar").keyup(function () {
          table.search(this.value).draw();
        });
      });
    },
    hidenav() {
      return this.$refs.layout.hide_nav();
    },
    shownav() {
      return this.$refs.layout.show_nav();
    },
    ActualizarTabla() {
      $("#tblPonentes").DataTable().destroy();
      this.TablaPonentes();
    },
    AgregarFotografia(e) {
      let control_name = e.target.name;

      if (control_name == "fotoPonente") {
        this.frmRegistrarPonente.fotoPonente = e.target.files[0];
        // console.log(this.frmRegistrarPonente.fotoPonente);
      }
    },
    NuevoPonente() {
      // console.log(pregunta.id);
      this.submited = false;
      this.title_modal = "NUEVO PONENTE";
      this.frmRegistrarPonente.id = 0;
      this.frmRegistrarPonente.nombre = "";
      this.frmRegistrarPonente.apellidoPaterno = "";
      this.frmRegistrarPonente.apellidoMaterno = "";
      this.frmRegistrarPonente.email = "";
      this.frmRegistrarPonente.dni = null;
      this.frmRegistrarPonente.descripcion = "";
      this.frmRegistrarPonente.telefono = null;
      this.frmRegistrarPonente.fotoPonente = null;
      this.frmRegistrarPonente.modal = "NUEVO";

      document.getElementById("modalPonente").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalPonente").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    EditarPonente(ponente) {
      this.submited = false;
      this.title_modal = "EDITAR PONENTE";
      this.frmRegistrarPonente.id = ponente.id;
      this.frmRegistrarPonente.nombre = ponente.nombre;
      this.frmRegistrarPonente.apellidoPaterno = ponente.apellidoPaterno;
      this.frmRegistrarPonente.apellidoMaterno = ponente.apellidoMaterno;
      this.frmRegistrarPonente.email = ponente.email;
      this.frmRegistrarPonente.dni = ponente.dni;
      this.frmRegistrarPonente.descripcion = ponente.descripcion;
      this.frmRegistrarPonente.telefono = ponente.telefono;
      this.frmRegistrarPonente.modal = "EDITAR";

      document.getElementById("modalPonente").style.display = "block";
      $("#btnCancelar").click(function () {
        document.getElementById("modalPonente").style.display = "none";
        parent.document.getElementById("footer-navigator").style.display =
          "flex";
      });
      parent.document.getElementById("footer-navigator").style.display = "none";
    },
    GuardarPonente() {
      // console.log("ingreso");
      this.submited = true;
      self = this;
      let data = new FormData();
      if (this.frmRegistrarPonente.modal == "NUEVO") {
        if (self.$v.frmRegistrarPonente.$invalid) {
          return false;
        } else {
          console.log("sddas");
          data.append("modal", self.frmRegistrarPonente.modal);
          data.append("dni", self.frmRegistrarPonente.dni);
          data.append("email", self.frmRegistrarPonente.email);
          axios
            .post(route("administrativa.verificar_ponentes"), data)
            .then(function (response) {
              let resultado = response.data;
              // console.log(resultado);
              if (resultado == "INCORRECTO_D") {
                Swal.fire({
                  icon: "error",
                  title: "¡Ups!",
                  text: "El DNI ingresado, ya está registrado, intente nuevamente.",
                });
                return false;
              } else if (resultado == "INCORRECTO_U") {
                Swal.fire({
                  icon: "error",
                  title: "¡Ups!",
                  text: "El USUARIO ingresado, ya está registrado, intente nuevamente.",
                });
                return false;
              } else {
                Swal.fire({
                  title: "GUARDAR CAMBIOS",
                  text: "¿Desea continuar?",
                  confirmButtonText:
                    '<i class="fas fa-check" style="color:white;"></i>   Si',
                  confirmButtonColor: "var(--colorAlto)",
                  showCancelButton: true,
                  cancelButtonText: '<i class="fas fa-times"></i>   No',
                  cancelButtonColor: "var(--plomoOscuroEmpresarial)",
                  allowOutsideClick: false,
                  preConfirm: (result) => {
                    self.$inertia.post(
                      route("administrativa.guardar_ponente"),
                      self.frmRegistrarPonente,
                      {
                        preserveScroll: true,
                        onStart: (visit) => {
                          let timerInterval;
                          Swal.fire({
                            title: "EN PROGRESO",
                            html: "Espere porfavor...",
                            timer: 2000,
                            allowOutsideClick: false,
                            timerProgressBar: true,
                            didOpen: () => {
                              Swal.showLoading();
                              timerInterval = setInterval(() => {
                                const content = Swal.getHtmlContainer();
                                if (content) {
                                  const b = content.querySelector("b");
                                  if (b) {
                                    b.textContent = Swal.getTimerLeft();
                                  }
                                }
                              }, 100);
                            },
                            willClose: () => {
                              clearInterval(timerInterval);
                            },
                          });
                        },
                        onSuccess: () => {
                          Swal.fire({
                            icon: "success",
                            title: "¡ÉXITO!",
                            allowOutsideClick: false,
                            preConfirm: (result) => {
                              self.submited = false;
                              // console.log(self.listar_ponentes);
                              $("#tblPonentes").DataTable().destroy();
                              self.TablaPonentes();
                              $("#modalPonente").css("display", "none");
                              $("#footer-navigator").css("display", "flex");
                              // self.ActualizarTabla();
                            },
                          });
                        },
                      }
                    );
                  },
                });
              }
            });
        }
      } else if (this.frmRegistrarPonente.modal == "EDITAR") {
        // console.log("EDITAR");
        Swal.fire({
          title: "GUARDAR CAMBIOS",
          text: "¿Desea continuar?",
          confirmButtonText:
            '<i class="fas fa-check" style="color:white;"></i>   Si',
          confirmButtonColor: "var(--colorAlto)",
          showCancelButton: true,
          cancelButtonText: '<i class="fas fa-times"></i>   No',
          cancelButtonColor: "var(--plomoOscuroEmpresarial)",
          allowOutsideClick: false,
          preConfirm: (result) => {
            self.$inertia.post(
              route("administrativa.guardar_ponente"),
              self.frmRegistrarPonente,
              {
                preserveScroll: true,
                onStart: (visit) => {
                  let timerInterval;
                  Swal.fire({
                    title: "EN PROGRESO",
                    html: "Espere porfavor...",
                    timer: 5000,
                    allowOutsideClick: false,
                    timerProgressBar: true,
                    didOpen: () => {
                      Swal.showLoading();
                      timerInterval = setInterval(() => {
                        const content = Swal.getHtmlContainer();
                        if (content) {
                          const b = content.querySelector("b");
                          if (b) {
                            b.textContent = Swal.getTimerLeft();
                          }
                        }
                      }, 100);
                    },
                    willClose: () => {
                      clearInterval(timerInterval);
                    },
                  });
                },
                onSuccess: () => {
                  Swal.fire({
                    icon: "success",
                    title: "¡ÉXITO!",
                    allowOutsideClick: false,
                    preConfirm: (result) => {
                      self.submited = false;
                      self.ActualizarTabla();
                      $("#modalPonente").css("display", "none");
                      $("#footer-navigator").css("display", "flex");
                    },
                  });
                },
              }
            );
          },
        });
      }
    },
  },
};
</script>

<style>
</style>