<div class="collection" style="border-top-right-radius:2%;border-top-left-radius:2%;">
  <div class="container" style="height:fit-content;width:100%;margin:0;position:relative;">
    <img src="res/img/background.png" alt="background-profile"
      style="width:100%;object-fit: cover;border-top-right-radius:2%;border-top-left-radius:2%;" draggable="false">
  </div>
  <a href="index.php?action=trangcanhan" class="collection-item">Hồ sơ</a>
  <a href="index.php" class="collection-item">Quản lý chi tiêu</a>
  <a href="index.php?action=qlthu" class="collection-item">Quản lý thu</a>
  <a href="index.php?action=qlsono" class="collection-item">Quản lý sổ nợ</a>
</div>

<script>
  $(document).ready(function () {
    var collection = $('.collection');
    var anchors = collection.find('a');
    anchors.each(function () {
      if ($(this).prop('href') == window.location.href) {
        $(this).addClass('active');
      }
    });

    $(document).ready(function () {
      $("#qlchitieu").click(function () {
        $("#qlchitieu-dropdown").slideToggle("slow");
      });
    });
  });
</script>