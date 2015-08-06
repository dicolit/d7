<div class="client-list-container">
  <div class="row client-list">
  <?php foreach($data['items'] as $item):?>
    <div class="col-md-4 client-item">
      <?php print $item->image;?>
    </div>
  <?php endforeach;?>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php print $data['pager'];?>
    </div>
  </div>
</div>
