orm-ms
======

A very simple Orm layer for Cms Made Simple
-------------------------------------------
because an example is worth a thousand speeches, here  a install file in a random CmsMadeSimple Module

Before : 
```php
$db =& $this->GetDb();

$db_prefix = cms_db_prefix();
$dict = NewDataDictionary($db);
$flds= "
  	id I,
    textid C(32),
		description C(255)
	";

$taboptarray = array('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_quotegroups', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);
$db->CreateSequence( cms_db_prefix()."module_quotegroups_seq" );

$flds= "
		id I,
    type I		
	";

$taboptarray = array('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_quotes', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);
$db->CreateSequence( cms_db_prefix()."module_quotes_seq" );

$flds= "
		quoteid I,
    name C(80),
		value X
	";
$taboptarray = array('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_quoteprops', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);


$flds= "
		id I,
    name C(80),
		isdefault I,
		content X
	";
$taboptarray = array('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_quotetemplates', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);
$db->CreateSequence( cms_db_prefix()."module_quotetemplates_seq" );

$flds= "
		quoteid I,
    groupid I		
	";
$taboptarray = array('mysql' => 'TYPE=MyISAM');
$sqlarray = $dict->CreateTableSQL(cms_db_prefix().'module_quoteconnections', $flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

$new_css_id = $db->GenID(cms_db_prefix() . "css_seq");
$css_name = "Module: Quotes Made Simple";
$css_text = file_get_contents('stylesheet.css');
$media_type = '';
$query = "INSERT INTO " . cms_db_prefix() . "css (css_id, css_name, css_text, media_type, create_date, modified_date) VALUES (?, ?, ?, ?, ?, ?)";
$result = $db->Execute($query, array($new_css_id, $css_name, $css_text, $media_type, $db->DBTimeStamp(time()), $db->DBTimeStamp(time())));
```
After :
```php
$entities = $this->getAllInstances();
foreach($entities as $anEntity)
{
  //Create tables for each entity
  Core::createTable($anEntity);
}

//Instanciate a new Css entity
$css = new Css();

//Populate values
$css->set('css_name','Module: Quotes Made Simple');
$css->set('css_text',file_get_contents('stylesheet.css'));
$css->set('media_type','');
$css->set('create_date',date());
$css->set('modified_date',date());

//Save the entity
$css->save();
```
Questions ? :]

Less code (-75%) equals less bug and obviously is a easier way to manage your code.
