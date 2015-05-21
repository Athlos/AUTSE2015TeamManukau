<?PHP
$file="http://unitec.researchbank.ac.nz/bitstream/handle/10652/2459/peer.pdf?sequence=1";
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
readfile($file);
?>