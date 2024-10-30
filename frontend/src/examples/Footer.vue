<template>
  <footer class="py-3 footer">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="mb-4 col-lg-6 mb-lg-0">
          <div class="text-sm text-center copyright text-muted"
            :class="this.$store.state.isRTL ? 'text-lg-end' : 'text-lg-start'">
            © {{ new Date().getFullYear() }}, made with
            <i class="fa fa-heart" aria-hidden="true"></i> by
            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">ADAM GMBH</a>
            
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">fon +49 541 6001544</a>
            </li>
            <li class="nav-item">
              <a href="https://www.updivision.com" class="nav-link text-muted" target="_blank">fax +49 541 6001559</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">mail hallo@adam-ki.de</a>
            </li>
            
          </ul>
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
