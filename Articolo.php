<?php
class Articolo
{
    private $ID_Articolo;
    private $descrizione;
    private $quantita;
    private $prezzo;

    public function __construct($ID_Articolo, $descrizione, $quantita, $prezzo)
    {
        $this->id = $ID_Articolo;
        $this->descrizione = $descrizione;
        $this->quantita = $quantita;
        $this->prezzo = $prezzo;
    }

    public function getID() { return $this->ID_Articolo; }
    public function getDescrizione() { return $this->descrizione; }
    public function getQuantita() { return $this->quantita; }
    public function getPrezzo() { return $this->prezzo; }

    public function setDescrizione($descrizione) { $this->descrizione = $descrizione; }
    public function setQuantita($quantita) { $this->quantita = $quantita; }
    public function setPrezzo($prezzo) { $this->prezzo = $prezzo; }
}
?>