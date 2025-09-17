<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMS System</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    pre {
      font-size: 0.85rem;
      white-space: pre-wrap;
      word-wrap: break-word;
    }
  </style>
</head>
<body>

  <div class="container my-5">
    <h2 class="text-center mb-4">📱 SMS System</h2>
    <p class="text-center text-muted">You can upload SMS commands using the following syntax:</p>

    <div class="row">
      <!-- Insert Product -->
      <div class="col-md-4">
        <div class="card shadow-sm border-0 mb-4">
          <div class="card-body">
            <h5 class="card-title fw-bold text-success">Insert Product</h5>
            <pre class="bg-light p-2 rounded"><code>*#*,INSERT,password,product title,category,type,stock,MRP,Base Price,keywords,description,delivery</code></pre>
            <p class="small text-muted mb-1">Example:</p>
            <pre class="bg-dark text-white p-2 rounded"><code>*#*,INSERT,myPass,Apple iPhone 15,Electronics,Mobile,50,79999,74999,smartphone,Latest iPhone model,2 Days</code></pre>
          </div>
        </div>
      </div>

      <!-- Update Product -->
      <div class="col-md-4">
        <div class="card shadow-sm border-0 mb-4">
          <div class="card-body">
            <h5 class="card-title fw-bold text-warning">Update Product</h5>
            <pre class="bg-light p-2 rounded"><code>*#*,UPDATE,password,product title,category,type,stock,MRP,Base Price,keywords,description,delivery</code></pre>
            <p class="small text-muted mb-1">Example:</p>
            <pre class="bg-dark text-white p-2 rounded"><code>*#*,UPDATE,myPass,Apple iPhone 15,Electronics,Mobile,60,77999,72999,smartphone,Updated pricing and stock,1 Day</code></pre>
          </div>
        </div>
      </div>

      <!-- Delete Product -->
      <div class="col-md-4">
        <div class="card shadow-sm border-0 mb-4">
          <div class="card-body">
            <h5 class="card-title fw-bold text-danger">Delete Product</h5>
            <pre class="bg-light p-2 rounded"><code>*#*,DELETE,password,product title,MRP</code></pre>
            <p class="small text-muted mb-1">Example:</p>
            <pre class="bg-dark text-white p-2 rounded"><code>*#*,DELETE,myPass,Apple iPhone 15,79999</code></pre>
          </div>
        </div>
      </div>
    </div>

    <!-- Rules Section -->
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h5 class="fw-bold">📌 Rules</h5>
        <ul class="text-muted small">
          <li><code>*#*</code> → Identifies the SMS as a system command</li>
          <li><code>password</code> → Your authentication password</li>
          <li><code>title</code> → Must match exactly for update/delete</li>
          <li><code>MRP</code> → Required in delete to prevent accidental removal of duplicates</li>
          <li>Use <strong>commas (,)</strong> to separate fields</li>
          <li><code>delivery</code> can be “In Stock”, “Out of Stock”, “2 Days” etc.</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
