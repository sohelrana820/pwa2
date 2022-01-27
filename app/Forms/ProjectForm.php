<?php

namespace App\Forms;


/**
 * AcknowledgeForm
 */
class ProjectForm extends FormValidator
{
    /**
     * @param array $data
     * @return \string[][]
     *
     */
    public function rules(array $data)
    {
        return [
            'lietas_nr' => 'required',
            'masinas_valsts_nr' => 'required',
            'marka' => 'required',
            'modelis' => 'required',
            'izlaiduma_gads' => 'required',
            'degviela' => 'required',
            'nobraukums' => 'required',
            'atrumkarba' => 'required',
            'motora_tilpums' => 'required',
            'piedzina' => 'required',
            'virsbuves_tips' => 'required',
            'sasija_nr' => 'required',
            'transporta_ipasnieks' => 'required',
            'apskates_vieta' => 'required',
            'riepu_veids' => 'required',
            'protektoru_dzilums' => 'required',
            'iespejami' => 'required',
            'datums' => 'required',
            'eksperts' => 'required',
            'sertefikata' => 'required',
            'piekritu' => 'required',
            'bojajumi' => 'required',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'lietas_nr.required' => 'Lietas NR. must be required',
            'masinas_valsts_nr.required' => 'Mašīnas valsts NR. must be required',
            'marka.required' => 'Marka must be required',
            'modelis.required' => 'Modelis must be required',
            'izlaiduma_gads.required' => 'Izlaiduma Gads must be required',
            'degviela.required' => 'Degviela must be required',
            'nobraukums.required' => 'Nobraukums must be required',
            'atrumkarba.required' => 'Ātrumkārba must be required',
            'motora_tilpums.required' => 'Motora tilpums must be required',
            'piedzina.required' => 'Piedziņa must be required',
            'virsbuves_tips.required' => 'Virsbūves Tips must be required',
            'sasija_nr.required' => 'Šasijas NR. Tips must be required',
            'transporta_ipasnieks.required' => 'Transportlīdzekļa īpašnieks must be required',
            'apskates_vieta.required' => 'Apskates Vieta must be required',
            'riepu_veids.required' => 'Riepu Veids must be required',
            'protektoru_dzilums.required' => 'Protektoru dziļums must be required',
            'iespejami.required' => 'Iespējami papildus defekti must be required',
            'datums.required' => 'Datums must be required',
            'eksperts.required' => 'Eksperts must be required',
            'sertefikata.required' => 'Sertefikāta nr. must be required',
            'piekritu.required' => 'Es piekrītu ka mani dati must be required',
            'bojajumi.required' => 'Konstatētie bojājumi must be required',
        ];
    }
}
