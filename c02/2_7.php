<!-------------------------------------------�ļ����� 2_7.php-------------------------------->
<!-- ����һ������POST�ⲿ������HTML�� -->
<form id="form1" name="form1" method="POST" action="">
  <label>����
  <input name="name" type="text" id="name" />
  </label>
  <label>����
  <input name="age" type="text" id="age" />
  </label>
  <label>
  <input type="submit" name="Submit" value="�ύ" />
  </label>
</form>
<!-- ����һ������GET�ⲿ������HTML�� -->
<form id="form2" name="form2" method="GET" action="">
  <label>ѧУ
  <input name="school" type="text" id="school" />
  �꼶
  <select name="class" id="class">
    <option value="һ�꼶" selected="selected">һ�꼶</option>
    <option value="���꼶">���꼶</option>
    <option value="���꼶">���꼶</option>
    <option value="���꼶">���꼶</option>
  </select>
  </label>
  <input type="submit" name="Submit" value="�ύ" />
</form>
<p>&nbsp;</p>
<?php
echo "ʹ��$"."_GET��ȡ�ⲿ������<br><pre>";
print_r($_GET);
echo "</pre>ʹ��$"."_POST��ȡ�ⲿ������<br><pre>";
print_r($_POST);
echo "</pre>ʹ��$"."_REQUEST��ȡ�ⲿ������<br><pre>";
print_r($_REQUEST);
echo "</pre>"
?>
