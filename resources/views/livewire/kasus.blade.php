    <div class ="m-auto">
        <div class="mb-3">
            <label class="inline-block w-32 font-bold mr-5">provinsi : </label>
            <select name="provinsi" wire:model="pprovinsi" class="border shadow p-2 bg-white form-control" <?= (!is_null($cek1))? 'disabled' : '';?>>
                <option value='' >pilih provinsi</option>
                @foreach($provinsi as $data)
                    <option value={{ $data->id }}>{{ $data->nama_prov }}</option>
                @endforeach
            </select>
        </div>
        @if(!is_null($pprovinsi))
            <div class="mb-3">
                <label class="inline-block w-32 font-bold mr-5">Kota :</label>
                <select name="kota" wire:model="pkota" 
                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-control"
                    <?= (!is_null($cek1))? 'disabled' : '';?>>
                    <option value='' >pilih kota</option>
                    @foreach($kota as $item)
                        <option value={{ $item->id }} <?= (!is_null($pprovinsi) && $item->id_prov == $pprovinsi)? 'selected' : '';?>>{{ $item->nama_kota }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if(!is_null($pkota))
            <div class="mb-3">
                <label class="inline-block w-32 font-bold mr-5">kecamatan :</label>
                <select name="kecamatan" wire:model="pkecamatan" 
                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-control"
                    <?= (!is_null($cek1))? 'disabled' : '';?>>
                    <option value=''>pilih kecamatan</option>
                    @foreach($kecamatan as $kec)
                        <option value={{ $kec->id }} <?= (!is_null($pkota) && $kec->id_kota == $pkota)? 'selected' : '';?>>{{ $kec->nama_kec }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if(!is_null($pkecamatan))

            <div class="mb-3">
                <label class="inline-block w-32 font-bold mr-5">kelurahan :</label>
                <select name="kelurahan" wire:model="pkelurahan" 
                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-control"
                    <?= (!is_null($cek1))? 'disabled' : '';?>>
                    <option value=''>pilih kelurahan</option>
                    @foreach($kelurahan as $kel)
                        <option value={{ $kel->id }} <?= (!is_null($pkecamatan) && $kel->id_kec == $pkecamatan)? 'selected' : '';?>>{{ $kel->nama_kel }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if(!is_null($pkelurahan))

            <div class="mb-3">
                <label class="inline-block w-32 font-bold mr-5">rw :</label>
                <select name="id_rw" wire:model="prw" 
                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-control"
                    <?= (!is_null($cek1))? 'disabled' : '';?>>
                    <option value=''>pilih rw</option>
                    @foreach($rw as $r)
                        <option value={{ $r->id }} <?= (!is_null($pkelurahan) && $r->id_kel == $pkelurahan)? 'selected' : '';?>>{{ $r->nama_rw }}</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>
