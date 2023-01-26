<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatable extends CI_Controller
{

    public function index()
    {
        echo "index";
    }
    public function pasien()
    {
        $this->load->model('datatable_pasien', 'datatable');
        $list = $this->datatable->get_datatables();
        $data = array();
        foreach ($list as $pasien) {
            $row = array();
            $row[] = $pasien->noCm;
            $row[] = $pasien->nik;
            $row[] = $pasien->nama;
            $row[] = $pasien->tempatLahir . ", " . $pasien->tglLahir;
            $row[] = $pasien->alamat . " Kel." . kelurahan($pasien->kelurahan) . " Kec." . kecamatan($pasien->kecamatan) . " " . kota($pasien->kota);
            $row[] = $pasien->asuransi;

            $edit = "<a href='" . site_url('pasien/edit?noCm=' . $pasien->noCm) . "' class='btn btn-warning'> Edit <a>";
            //$row[] = $edit."<a href='".site_url('kunjungan/detail?id_pasien='.$pasien->id_pasien)."' class='btn btn-success'> Detail <a>";
            $row[] = $edit;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatable->count_all(),
            "recordsFiltered" => $this->datatable->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
    public function users()
    {
        check_level();
        $this->load->model('datatable_users', 'datatable');
        $list = $this->datatable->get_datatables();
        // print_r($this->db->last_query());
        // die();
        $csrfName = $this->security->get_csrf_token_name();
        $csrfHash = $this->security->get_csrf_hash();
        $data = array();
        $no = 1;
        foreach ($list as $kl) {
            $row = array();
            $row[] = $no;
            $row[] = $kl->klinik;
            $row[] = $kl->username;
            $row[] = $kl->nama;
            $row[] = $kl->status == 1 ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-warning">Nonaktif</span>';
            $row[] = ucfirst($kl->role);
            $row[] = $kl->email == null ? '-' : $kl->email;
            // $edit = "<a href='" . site_url('pasien/edit?noCm=' . $kl->klinik) . "' class='btn btn-warning me-2'> Edit <a>";
            // $row[] = $edit . "<a href='" . site_url('kunjungan/detail?id_pasien=' . $kl->klinik) . "' class='btn btn-success me-2'> Detail <a>";
            // $row[] = $edit;
            $edit = '<table class="table-borderless text-center" >
            <tbody>
            <tr class="text-center">
            <td class="text-center">
            <button type="button" class="btn btn-secondary" onclick="window.location.href=\'' . site_url('admin/klinik/reset?kode=' . $kl->klinik) . '\'" >Reset</button>
            </td>';
            if ($kl->status == 1) {
                $edit = $edit . '<td class="text-center">
                <button type="button" class="btn btn-warning" onclick="window.location.href=\'' . site_url('admin/klinik/nonaktifkan?kode=' . $kl->klinik) . '\'" >Nonaktifkan</button>
                </td>';
            } else {
                $edit = $edit . '<td class="text-center">
                <button type="button" class="btn btn-success" onclick="window.location.href=\'' . site_url('admin/klinik/aktifkan?kode=' . $kl->klinik) . '\'" >Aktifkan</button>
                </td>';
            }
            $edit = $edit . '
            <td class="text-center">
            <button type="button" class="btn btn-primary" onclick="window.location.href=\'' . site_url('admin/klinik/edit?kode=' . $kl->klinik) . '\'" >Edit</button>
            </td>
            <td class="text-center">
            <button type="button" class="btn btn-danger" onclick="window.location.href=\'' . site_url('admin/klinik/hapus?kode=' . $kl->klinik) . '\'" >Hapus</button>
            </td>
            </tr>
            </tbody>
            </table>';
            $row[] = $edit;
            $data[] = $row;
            $no++;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatable->count_all(),
            "recordsFiltered" => $this->datatable->count_filtered(),
            "data" => $data,
        );
        //output to json format
        $output[$csrfName] = $csrfHash;
        $this->output->set_output(json_encode($output));
    }
    public function cekklinik()
    {
        $data = null;
        $klinik = json_decode(file_get_contents('http://119.2.50.170:9095/klinik/api/klinik/detailbaru?kode=' . $this->input->post('data') . '&fun=Login SimKlinik'));
        if ($klinik->status) {
            $data['nama_faskes'] = 'Klinik ' . $klinik->data->nama;
            $data['kode_faskes'] = $klinik->data->kode_klinik;
            $data['email_faskes'] = $klinik->data->email_faskes;
            $data['pj'] = $klinik->data->pj;
            $data['kontak_pj'] = $klinik->data->hp_pj;
            $data['ijin_faskes'] = $klinik->data->sip;
            $data['tgl_berakhir_ijin'] = date("d-m-Y", strtotime($klinik->data->tgl_berakhir_ijin));
            $data['alamat'] = $klinik->data->alamat;
            $data['nama_kelurahan'] = $klinik->data->nama_kelurahan;
            $data['nama_kecamatan'] = $klinik->data->nama_kecamatan;
            $data['kontak_faskes'] = $klinik->data->telp;
            $data['koordinat'] = $klinik->data->koordinat;
            $data['jadwal'] = $klinik->data->jadwal;
            $data['kode_kel'] = $klinik->data->kode_kelurahan;
            $data['kode_kec'] = $klinik->data->kode_kecamatan;
            $data['csrfName'] = $this->security->get_csrf_token_name();
            $data['csrfHash'] = $this->security->get_csrf_hash();
            $resp = array('status' => TRUE, 'data' => $data);
        } else {
            $resp = array('status' => FALSE, 'data' => null);
        }
        header("Content-Type:application/json");
        echo json_encode($resp);
    }
}

/* End of file datatable.php */
/* Location: ./application/controllers/datatable.php */