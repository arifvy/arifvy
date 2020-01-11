<form action="<?=site_url('kelas/simpanedit');?>" method="POST">
    <tables>
        <tr>
            <td>Nama Kelas</td>
            <td>
                <input type="text" name="namakelas" id="namakelas" value="<?=$datakelas->namakelas;?>"/>
                <input type="hidden" name="id" id="id" value="<?=$datakelas->id;?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Simpan" id="submit/">
            </td>
            <td></td>
        </tr>
    </tables>