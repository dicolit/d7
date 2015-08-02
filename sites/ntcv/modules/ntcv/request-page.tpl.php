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
      <?php print $value->title;?>
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
