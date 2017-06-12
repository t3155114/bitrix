<?

function BXIBlockAfterSave($arFields)
{
	$db_props = CIBlockElement::GetProperty($arFields["IBLOCK_ID"], $arFields['ID'], "sort", "asc", Array("CODE"=>"movie"));
      
	   while($ar_props = $db_props->Fetch())     

        {
			  if ($ar_props["VALUE"])
				  {
				 $ar_val = $ar_props["VALUE"];
				  $ar_val_id = $ar_props["PROPERTY_VALUE_ID"];

				  // формируем путь к файлу картинки путем сложения адреса сайта и внутреннего пути к картинке
				$moviepath = $_SERVER['DOCUMENT_ROOT'].CFile::GetPath($ar_props["VALUE"]);
				//находим точку перед расширением
				$stindx = strripos($moviepath, ".");
				//формируем название img файла
				$imgfile = substr($moviepath, 0, $stindx+1).'jpg'; 
				// run ffmpeg -формируем картинку
				exec('ffmpeg -ss 00:00:05 -i '.$moviepath. ' -f image2 -vframes 1 '. $imgfile, $output, $return);
				  
				 
           // обновляем картинку
            $be = new CIBlockElement();
			
            $be->Update($arFields['ID'], Array('PREVIEW_PICTURE' => CFile::MakeFileArray($imgfile)), false);
            
      }      
   }
}
   


?>
