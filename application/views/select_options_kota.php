<select id="kota" name="kota" class="form-control">
    <option value="">-- Select Kota --</option>
    <?php
    foreach ($kota_lists as $key => $value)
    {
        echo '<option value="'.$value->id_kota.'">'.ucwords($value->kota).' - '.$value->price.'</option>';
    }
    ?>
</select>