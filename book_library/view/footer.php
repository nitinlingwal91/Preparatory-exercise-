<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  html,
  body {
    height: 100%;
  }
  
  #sticky-footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    margin-right: auto;
    padding: auto;
    text-align: center;
  }

  /* Media query for small screens */
  @media (max-width: 576px) {
    #sticky-footer {
      padding: 10px;
    }
  }
</style>

<body>
  
  <div class="content">
  </div>
  
  <footer id="sticky-footer" class="flex-shrink-0 bg-primary text-white-50">
    <div class="container text-center">
      <h5 class="my-2">© 2023 E-library</h5>
    </div>
  </footer>
</body>

