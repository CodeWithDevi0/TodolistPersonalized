
<nav aria-label="...">
  <ul class="pagination pagination-sm justify-content-center">
    <?php for ($i=1; $i <= $pages ; $i++): ?>
    <li class="page-item active" aria-current="page">
      <a href="?page=<?echp $i; ?>"><?php echo $i; ?></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
  </ul> 
</nav>