<?php

namespace App\Models;

use CodeIgniter\Model;

class GangguanModel extends Model
{
    protected $table = 'gangguan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_tiket', 'nama_gangguan', 'id_link', 'detail', 'start', 'end', 'id_status', 'approval', 'keterangan_submit', 'keterangan_reject', 'bukti_submit', 'waktu_submit', 'keterangan_stopclock', 'start_stopclock', 'extra_time_stopclock', 'approval_stopclock', 'ket_reject_stopclock', 'approval_stopclock_spv', 'ket_reject_stopclock_spv', 'offline', 'sla', 'restitusi', 'tagihan_bulanan'];


    public function getGangguan()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('status.kategori')
            ->select('gangguan.*')
            // ->where('gangguan.id_status', '1')
            // ->orWhere('gangguan.id_status', '2')
            // ->where('gangguan.approval', null)
            ->Where('gangguan.approval', null)
            ->orWhere('gangguan.approval', 'NO')
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getGangguanSelesai()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.*')
            ->select('status.kategori')
            ->where('gangguan.approval', 'YES')
            ->select('gangguan.*')
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getGangguanSupervisor()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('status.kategori')
            ->select('gangguan.*')
            ->where('gangguan.approval_stopclock', 'YES')
            ->where('gangguan.approval_stopclock_spv', null)
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getStopClockSupervisor()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('status.kategori')
            ->select('gangguan.*')
            ->where('gangguan.approval_stopclock_spv', 'YES')
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getProvider()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.id_provider')
            // ->where('gangguan.approval !=', 'YES')
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getGangguanProvider($id_provider)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('status.kategori')
            ->select('gangguan.*')
            ->where('gangguan.approval', 'NO')
            ->orWhere('gangguan.approval', null)
            ->where('link.id_provider', $id_provider)
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getAllGangguan()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('link.jenis_link')
            ->select('status.kategori')
            ->select('gangguan.*')
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getAllGangguanProvider($id_provider)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.nama_link')
            ->select('link.jenis_link')
            ->select('status.kategori')
            ->select('gangguan.*')
            ->where('link.id_provider', $id_provider)
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getGangguanSelesaiProvider($id_provider)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->join('provider', 'provider.id=link.id_provider', 'left')
            ->join('branch', 'branch.id=link.id_branch', 'left')
            ->join('jenis_branch', 'jenis_branch.id=branch.id_jenis_branch', 'left')
            ->select('link.nama_link')
            ->select('link.jenis_link')
            ->select('status.kategori')
            ->select('branch.nama_branch')
            ->select('provider.nama_provider')
            ->select('gangguan.*')
            ->where('link.id_provider', $id_provider)
            ->where('gangguan.approval', 'YES')
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getAllWaktuSubmit()
    {
        return $this->db->table('gangguan')
            ->select('waktu_submit')
            ->get()->getResultArray();
    }

    public function getAllWaktuStart()
    {
        return $this->db->table('gangguan')
            ->select('start')
            ->get()->getResultArray();
    }

    public function getWaktuSubmit($id)
    {
        return $this->db->table('gangguan')
            ->select('waktu_submit')
            ->where('id', $id)
            ->get()->getRow();
    }

    public function getWaktuStart($id)
    {
        return $this->db->table('gangguan')
            ->select('start')
            ->where('id', $id)
            ->get()->getRow();
    }

    public function getWaktuEnd($id)
    {
        return $this->db->table('gangguan')
            ->select('end')
            ->where('id', $id)
            ->get()->getRow();
    }

    public function getWaktuStartStopClock($id)
    {
        return $this->db->table('gangguan')
            ->select('start_stopclock')
            ->where('id', $id)
            ->get()->getRow();
    }

    public function getWaktuExtra($id)
    {
        return $this->db->table('gangguan')
            ->select('extra_time_stopclock')
            ->where('id', $id)
            ->get()->getRow();
    }

    public function getBiayaBulanan($id)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->select('link.biaya_bulanan', 'biaya_bulanan')
            ->where('gangguan.id', $id)
            ->get()->getRow()->biaya_bulanan;
    }

    public function getJumlahGangguan()
    {
        return $this->db->table('gangguan')
            ->countAllResults() + 1;
    }

    public function getTotalGangguan()
    {
        return $this->db->table('gangguan')
            ->select('*')
            ->where('MONTH(gangguan.start)', date('m'))
            ->countAllResults();
    }

    public function getTotalGangguanProvider($id_provider)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->select('*')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('link.id_provider', $id_provider)
            ->countAllResults();
    }

    public function getTotalGangguanSla()
    {
        return $this->db->table('gangguan')
            ->select('*')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('gangguan.sla !=', null)
            ->countAllResults();
    }

    public function getTotalGangguanSlaProvider($id_provider)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->select('*')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('gangguan.sla !=', null)
            ->where('link.id_provider', $id_provider)
            ->countAllResults();
    }

    public function getGangguanCurrent()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->join('branch', 'branch.id=link.id_branch', 'left')
            ->join('jenis_branch', 'jenis_branch.id=branch.id_jenis_branch', 'left')
            ->join('provider', 'provider.id=link.id_provider', 'left')
            // ->select('link.nama_link')
            ->select('*')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('gangguan.sla !=', null)
            ->get()->getResultArray();
    }

    public function getAllSla()
    {
        return  $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link')
            ->select('gangguan.sla')
            ->select('link.biaya_bulanan')
            ->select('gangguan.no_tiket')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('gangguan.sla !=', null)
            ->orderBy('gangguan.id')
            ->get()->getResultArray();
    }

    public function getJumlahAllSla()
    {
        return  $this->db->table('gangguan')
            ->selectSum('gangguan.sla', 'sum_sla')
            ->where('MONTH(gangguan.start)', date('m'))
            ->get()->getRow()->sum_sla;
    }

    public function getJumlahAllSlaProvider($id_provider)
    {
        return  $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->selectSum('gangguan.sla', 'sum_sla')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('link.id_provider', $id_provider)
            ->get()->getRow()->sum_sla;
    }

    public function getJumlahAllBiayaBulanan()
    {
        return  $this->db->table('gangguan')
            // ->join('link', 'link.id=gangguan.id_link')
            ->selectSum('gangguan.tagihan_bulanan', 'sum_biaya_bulanan')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('gangguan.sla !=', null)
            ->get()->getRow()->sum_biaya_bulanan;
    }

    public function getJumlahAllBiayaBulananProvider($id_provider)
    {
        return  $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link')
            ->selectSum('gangguan.tagihan_bulanan', 'sum_biaya_bulanan')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('gangguan.sla !=', null)
            ->where('link.id_provider', $id_provider)
            ->get()->getRow()->sum_biaya_bulanan;
    }

    public function getJumlahRestitusi()
    {
        return  $this->db->table('gangguan')
            // ->join('link', 'link.id=gangguan.id_link')
            ->selectSum('gangguan.restitusi', 'sum_restitusi')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('gangguan.sla !=', null)
            ->get()->getRow()->sum_restitusi;
    }

    public function getJumlahRestitusiProvider($id_provider)
    {
        return  $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link')
            ->selectSum('gangguan.restitusi', 'sum_restitusi')
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('gangguan.sla !=', null)
            ->where('link.id_provider', $id_provider)
            ->get()->getRow()->sum_restitusi;
    }

    public function getBandwidthLink()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('status', 'status.id=gangguan.id_status', 'left')
            ->select('link.bandwidth')
            ->get()->getResultArray();
    }

    public function getTotalGangguanFinish($month)
    {
        return $this->db->table('gangguan')
            ->select('*')
            ->where('gangguan.id_status', 5)
            ->where('MONTH(gangguan.start)', $month)
            ->where('YEAR(gangguan.start)', date('Y'))
            ->countAllResults();
    }
    public function getTotalGangguanFinishProvider($month, $provider)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->select('*')
            ->where('gangguan.id_status', 5)
            ->where('MONTH(gangguan.start)', $month)
            ->where('YEAR(gangguan.start)', date('Y'))
            ->where('link.id_provider', $provider)
            ->countAllResults();
    }

    public function getTotalGangguanFinishCurrent()
    {
        return $this->db->table('gangguan')
            ->select('*')
            ->where('gangguan.id_status', 5)
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('YEAR(gangguan.start)', date('Y'))
            ->countAllResults();
    }
    public function getTotalGangguanFinishCurrentProvider($provider)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->select('*')
            ->where('gangguan.id_status', 5)
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('YEAR(gangguan.start)', date('Y'))
            ->where('link.id_provider', $provider)
            ->countAllResults();
    }

    public function getTotalGangguanOver($month)
    {
        return $this->db->table('gangguan')
            ->select('*')
            ->where('gangguan.id_status', 3)
            ->where('MONTH(gangguan.start)', $month)
            ->where('YEAR(gangguan.start)', date('Y'))
            ->countAllResults();
    }

    public function getTotalGangguanOverProvider($month, $provider)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->select('*')
            ->where('gangguan.id_status', 3)
            ->where('MONTH(gangguan.start)', $month)
            ->where('YEAR(gangguan.start)', date('Y'))
            ->where('link.id_provider', $provider)
            ->countAllResults();
    }

    public function getTotalGangguanOverCurrent()
    {
        return $this->db->table('gangguan')
            ->select('*')
            ->where('gangguan.id_status', 3)
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('YEAR(gangguan.start)', date('Y'))
            ->countAllResults();
    }

    public function getTotalGangguanOverProviderCurrent($id_provider)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->select('*')
            ->where('gangguan.id_status', 3)
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('YEAR(gangguan.start)', date('Y'))
            ->where('link.id_provider', $id_provider)
            ->countAllResults();
    }

    public function getTotalGangguanProcessCurrent()
    {
        return $this->db->table('gangguan')
            ->select('*')
            ->where('gangguan.id_status', 1)
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('YEAR(gangguan.start)', date('Y'))
            ->countAllResults();
    }

    public function getTotalGangguanProcessProviderCurrent($id_provider)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->select('*')
            ->where('gangguan.id_status', 1)
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('YEAR(gangguan.start)', date('Y'))
            ->where('link.id_provider', $id_provider)
            ->countAllResults();
    }

    public function getTotalGangguanStopClockCurrent()
    {
        return $this->db->table('gangguan')
            ->select('*')
            ->where('gangguan.id_status', 4)
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('YEAR(gangguan.start)', date('Y'))
            ->countAllResults();
    }

    public function getTotalGangguanStopClockProviderCurrent($id_provider)
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->select('*')
            ->where('gangguan.id_status', 4)
            ->where('MONTH(gangguan.start)', date('m'))
            ->where('YEAR(gangguan.start)', date('Y'))
            ->where('link.id_provider', $id_provider)
            ->countAllResults();
    }

    public function getTotalGangguanAllTelkom()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('provider', 'provider.id=link.id_provider', 'left')
            ->select('*')
            ->where('provider.nama_provider', 'Telkom')
            ->where('gangguan.sla !=', null)
            ->countAllResults();
    }
    public function getTotalGangguanAllTigatra()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('provider', 'provider.id=link.id_provider', 'left')
            ->select('*')
            ->where('provider.nama_provider', 'Tigatra')
            ->where('gangguan.sla !=', null)
            ->countAllResults();
    }
    public function getTotalGangguanAllPrimalink()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('provider', 'provider.id=link.id_provider', 'left')
            ->select('*')
            ->where('provider.nama_provider', 'PrimaLink')
            ->where('gangguan.sla !=', null)
            ->countAllResults();
    }
    public function getTotalGangguanAllLintasarta()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('provider', 'provider.id=link.id_provider', 'left')
            ->select('*')
            ->where('provider.nama_provider', 'LintasArta')
            ->where('gangguan.sla !=', null)
            ->countAllResults();
    }
    public function getTotalGangguanAllIpwan()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('provider', 'provider.id=link.id_provider', 'left')
            ->select('*')
            ->where('provider.nama_provider', 'IPWAN')
            ->where('gangguan.sla !=', null)
            ->countAllResults();
    }
    public function getTotalGangguanAllBas()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('provider', 'provider.id=link.id_provider', 'left')
            ->select('*')
            ->where('provider.nama_provider', 'BAS')
            ->where('gangguan.sla !=', null)
            ->countAllResults();
    }
    public function getTotalGangguanAllIForte()
    {
        return $this->db->table('gangguan')
            ->join('link', 'link.id=gangguan.id_link', 'left')
            ->join('provider', 'provider.id=link.id_provider', 'left')
            ->select('*')
            ->where('provider.nama_provider', 'IForte')
            ->where('gangguan.sla !=', null)
            ->countAllResults();
    }
}
