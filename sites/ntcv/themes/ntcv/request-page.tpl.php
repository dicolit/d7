<p>Bạn muốn có một chữ của riêng mình? Hãy <a href="<?php print url('request/0/edit');?>">đăng ký</a> với chúng tôi.</p>
<table>
  <tr>
    <th>
      Tên
    </th>
    <th>
      Thể loại
    </th>
    <th>
      Số lần
    </th>
    <th>
      Ngày đăng ký
    </th>
  </tr>
  <?php foreach($data['items'] as $key=>$value):?>
  <tr>
    <td>
      <strong><?php print $value->title;?></strong>
    </td>
    <td>
      <?php print $value->category_name;?>
    </td>
    <td>
      <?php print $value->total;?>
    </td>
    <td>
      <?php print $value->created;?>
    </td>
  </tr>
  <?php endforeach;?>
</table>
