<template>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="py-5 footer">
    <div class="container">
      <div class="row">
        <div class="mx-auto mb-4 text-center col-lg-12">
          <a
            href="javascript:;"
            target="_blank"
            class="mb-2 text-secondary me-xl-6 me-3 mb-sm-0"
          >
          Natruper Str. 14,
49076 Osnabrück<br>
Route berechnen
          </a>
          <a
            href="javascript:;"
            target="_blank"
            class="mb-2 text-secondary me-xl-5 me-3 mb-sm-0"
          >
          fon +49 541 6001544
          </a>
          <a
            href="javascript:;"
            target="_blank"
            class="mb-2 text-secondary me-xl-5 me-3 mb-sm-0"
          >
          fax +49 541 6001559
          </a>
          <a
            href="javascript:;"
            target="_blank"
            class="mb-2 text-secondary me-xl-5 me-3 mb-sm-0"
          >
          mail-hallo@adam-ki.de
          </a>
          <a
            href="javascript:;"
            target="_blank"
            class="mb-2 text-secondary me-xl-5 me-3 mb-sm-0"
          >
          Impressum
          </a>
          <a
            href="javascript:;"
            target="_blank"
            class="mb-2 text-secondary me-xl-5 me-3 mb-sm-0"
          >
          Datenschutz
          </a>
          <a
            href="javascript:;"
            target="_blank"
            class="mb-2 text-secondary mb-sm-0"
          >
          AGB
          </a>
        </div>
        <div class="mx-auto mt-2 mb-4 text-center col-lg-8">
          <a
            href="javascript:;"
            target="_blank"
            class="text-secondary me-xl-4 me-4"
          >
            <span class="text-lg fab fa-dribbble"></span>
          </a>
          <a
            href="javascript:;"
            target="_blank"
            class="text-secondary me-xl-4 me-4"
          >
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a
            href="javascript:;"
            target="_blank"
            class="text-secondary me-xl-4 me-4"
          >
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a
            href="javascript:;"
            target="_blank"
            class="text-secondary me-xl-4 me-4"
          >
            <span class="text-lg fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="mx-auto mt-1 text-center col-8">
          <p class="mb-0 text-secondary">
            Copyright © {{ new Date().getFullYear() }}  by ADAM GMBH.
          </p>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "app-footer",
};
</script>
