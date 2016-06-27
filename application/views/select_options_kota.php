<select id="id_kota" name="id_kota" class="form-control">
    <option value="">-- Select Kota --</option>
    <?php
    foreach ($kota_lists as $key => $value)
    {
        echo '<option id="'.$value->id_kota.'" value="'.$value->id_kota.'"'.set_select('id_kota', $val->id_kota).'>'.ucwords($value->kota).' - '.$value->price.'</option>';
    }
    ?>
</select>