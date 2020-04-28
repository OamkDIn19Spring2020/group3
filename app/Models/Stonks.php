<?php
namespace App\Models;

class Stonks extends Database
{
    protected $table = 'stonks';
    public function randomize_stonk_name(){
        $arr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $arrlen = strlen($arr);
        $randomStonkName = '';
        for ($i = 0; $i < 3; $i++) {
            $randomStonkName .= $arr[rand(0, $arrlen - 1)];
        }
        return $randomStonkName;
    }
    public function add_stonk() {
        $default_stonk_desc = ['Good choice for beginner traders.', 'Unusual investment', 'High returns guaranteed, at your own risk', 'Only recommended for vip traders and stonklords', 'Bullish?'];
        $query = $this->db->query(
            'INSERT INTO stonks 
            (stonk_name, issuer_id, stonk_desc, stonk_tradable, base, volatility) VALUES
            ("'.$this->randomize_stonk_name().'", '.rand(2,4).', "'.$default_stonk_desc[rand(0,4)].'", true, '.rand(10, 100).','.rand(1, 10).')'
        );
    }
    //FETCH ALL STONK PROPERTIES
    public function get_stonk_properties()
    {
        return $this->db->table('stonks')->select('*')->join('issuers', 'stonks.issuer_id = issuers.issuer_id', 'inner')->where('stonk_id > 1')->get()->getResult();
    }
}
