@extends('layouts.afterlogin.dashboard')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{ __('messages.general_settings') }}
		</h1>

	</section>

<section class="content">
	<div class="row">
		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">

			<div class="box-body">
				<form id="settings_form" action="" method="POST" style="padding-top:10px;">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<div class="col-md-1">
						<label for="email">{{__('messages.admin_email')}}</label>
					</div>
					<div class="col-md-11">
						<div class="form-group">
                            <input type="email" name="admin_email" class="form-control" id="admin_email" value="{{$settings_email_val != '' ? $settings_email_val : ''}}"  data-old="" style="width:200px" {{ (Auth::user()->type==1) ? '' : 'readonly'}}>
						    @error('email')
						       <span class="invalid-feedback text-danger" role="alert">
						           <strong>{{ $message }}</strong>
						       </span>
						   @enderror
						</div>
					</div>

					<div class="col-md-1">
						<label for="language">{{__('messages.site_language')}}</label>
					</div>
					<div class="col-md-11">
						<div class="form-group">
                        @if(Auth::user()->type==1)
                        <select class="form-control" name="language" id="language" data-old="" style="width:200px">
							<option value="en" {{$settings_language_val=='en' ? "selected='selected'" : ''}}>English (United States)</option>
							<option value="af" lang="af" {{$settings_language_val=='af' ? "selected='selected'" : ''}}>Afrikaans</option>
							<option value="ar" lang="ar" {{$settings_language_val=='ar' ? "selected='selected'" : ''}}>العربية</option>
							<option value="ary" lang="ar" {{$settings_language_val=='ary' ? "selected='selected'" : ''}}>العربية المغربية</option>
							<option value="as" lang="as" {{$settings_language_val=='as' ? "selected='selected'" : ''}}>অসমীয়া</option>
							<option value="az" lang="az" {{$settings_language_val=='az' ? "selected='selected'" : ''}}>Azərbaycan dili</option>
							<option value="azb" lang="az" {{$settings_language_val=='azb' ? "selected='selected'" : ''}}>گؤنئی آذربایجان</option>
							<option value="bel" lang="be" {{$settings_language_val=='bel' ? "selected='selected'" : ''}}>Беларуская мова</option>
							<option value="bg_BG" lang="bg" {{$settings_language_val=='bg_BG' ? "selected='selected'" : ''}}>Български</option>
							<option value="bn_BD" lang="bn" {{$settings_language_val=='bn_BD' ? "selected='selected'" : ''}}>বাংলা</option>
							<option value="bo" lang="bo" {{$settings_language_val=='bo' ? "selected='selected'" : ''}}>བོད་ཡིག</option>
							<option value="bs_BA" lang="bs" {{$settings_language_val=='bs_BA' ? "selected='selected'" : ''}}>Bosanski</option>
							<option value="ca" lang="ca" {{$settings_language_val=='ca' ? "selected='selected'" : ''}}>Català</option>
							<option value="ceb" lang="ceb" {{$settings_language_val=='ceb' ? "selected='selected'" : ''}}>Cebuano</option>
							<option value="cs_CZ" lang="cs" {{$settings_language_val=='cs_CZ' ? "selected='selected'" : ''}}>Čeština</option>
							<option value="cy" lang="cy" {{$settings_language_val=='cy' ? "selected='selected'" : ''}}>Cymraeg</option>
							<option value="da_DK" lang="da" {{$settings_language_val=='da_DK' ? "selected='selected'" : ''}}>Dansk</option>
							<option value="de_DE_formal" lang="de" {{$settings_language_val=='de_DE_formal' ? "selected='selected'" : ''}}>Deutsch (Sie)</option>
							<option value="de_CH" lang="de" {{$settings_language_val=='de_CH' ? "selected='selected'" : ''}}>Deutsch (Schweiz)</option>
							<option value="de_CH_informal" lang="de" {{$settings_language_val=='de_CH_informal' ? "selected='selected'" : ''}}>Deutsch (Schweiz, Du)</option>
							<option value="de_AT" lang="de" {{$settings_language_val=='de_AT' ? "selected='selected'" : ''}}>Deutsch (Österreich)</option>
							<option value="de_DE" lang="de" {{$settings_language_val=='de_DE' ? "selected='selected'" : ''}}>Deutsch</option>
							<option value="dzo" lang="dz" {{$settings_language_val=='dzo' ? "selected='selected'" : ''}}>རྫོང་ཁ</option>
							<option value="el" lang="el" {{$settings_language_val=='el' ? "selected='selected'" : ''}}>Ελληνικά</option>
							<option value="en_AU" lang="en" {{$settings_language_val=='en_AU' ? "selected='selected'" : ''}}>English (Australia)</option>
							<option value="en_GB" lang="en" {{$settings_language_val=='en_GB' ? "selected='selected'" : ''}}>English (UK)</option>
							<option value="en_NZ" lang="en" {{$settings_language_val=='en_NZ' ? "selected='selected'" : ''}}>English (New Zealand)</option>
							<option value="en_ZA" lang="en" {{$settings_language_val=='en_ZA' ? "selected='selected'" : ''}}>English (South Africa)</option>
							<option value="en_CA" lang="en" {{$settings_language_val=='en_CA' ? "selected='selected'" : ''}}>English (Canada)</option>
							<option value="eo" lang="eo" {{$settings_language_val=='eo' ? "selected='selected'" : ''}}>Esperanto</option>
							<option value="es_CL" lang="es" {{$settings_language_val=='es_CL' ? "selected='selected'" : ''}}>Español de Chile</option>
							<option value="es_ES" lang="es" {{$settings_language_val=='es_ES' ? "selected='selected'" : ''}}>Español</option>
							<option value="es_VE" lang="es" {{$settings_language_val=='es_VE' ? "selected='selected'" : ''}}>Español de Venezuela</option>
							<option value="es_GT" lang="es" {{$settings_language_val=='es_GT' ? "selected='selected'" : ''}}>Español de Guatemala</option>
							<option value="es_MX" lang="es" {{$settings_language_val=='es_MX' ? "selected='selected'" : ''}}>Español de México</option>
							<option value="es_CR" lang="es" {{$settings_language_val=='es_CR' ? "selected='selected'" : ''}}>Español de Costa Rica</option>
							<option value="es_CO" lang="es" {{$settings_language_val=='es_CO' ? "selected='selected'" : ''}}>Español de Colombia</option>
							<option value="es_PE" lang="es" {{$settings_language_val=='es_PE' ? "selected='selected'" : ''}}>Español de Perú</option>
							<option value="es_AR" lang="es" {{$settings_language_val=='es_AR' ? "selected='selected'" : ''}}>Español de Argentina</option>
							<option value="et" lang="et" {{$settings_language_val=='et' ? "selected='selected'" : ''}}>Eesti</option>
							<option value="eu" lang="eu" {{$settings_language_val=='eu' ? "selected='selected'" : ''}}>Euskara</option>
							<option value="fa_IR" lang="fa" {{$settings_language_val=='fa_IR' ? "selected='selected'" : ''}}>فارسی</option>
							<option value="fi" lang="fi" {{$settings_language_val=='fi' ? "selected='selected'" : ''}}>Suomi</option>
							<option value="fr_FR" lang="fr" {{$settings_language_val=='fr_FR' ? "selected='selected'" : ''}}>Français</option>
							<option value="fr_CA" lang="fr" {{$settings_language_val=='fr_CA' ? "selected='selected'" : ''}}>Français du Canada</option>
							<option value="fr_BE" lang="fr" {{$settings_language_val=='fr_BE' ? "selected='selected'" : ''}}>Français de Belgique</option>
							<option value="fur" lang="fur" {{$settings_language_val=='fur' ? "selected='selected'" : ''}}>Friulian</option>
							<option value="gd" lang="gd" {{$settings_language_val=='gd' ? "selected='selected'" : ''}}>Gàidhlig</option>
							<option value="gl_ES" lang="gl" {{$settings_language_val=='gl_ES' ? "selected='selected'" : ''}}>Galego</option>
							<option value="gu" lang="gu" {{$settings_language_val=='gu' ? "selected='selected'" : ''}}>ગુજરાતી</option>
							<option value="haz" lang="haz" {{$settings_language_val=='haz' ? "selected='selected'" : ''}}>هزاره گی</option>
							<option value="he_IL" lang="he" {{$settings_language_val=='he_IL' ? "selected='selected'" : ''}}>עִבְרִית</option>
							<option value="hi_IN" lang="hi" {{$settings_language_val=='hi_IN' ? "selected='selected'" : ''}}>हिन्दी</option>
							<option value="hr" lang="hr" {{$settings_language_val=='hr' ? "selected='selected'" : ''}}>Hrvatski</option>
							<option value="hu_HU" lang="hu" {{$settings_language_val=='hu_HU' ? "selected='selected'" : ''}}>Magyar</option>
							<option value="hy" lang="hy" {{$settings_language_val=='hy' ? "selected='selected'" : ''}}>Հայերեն</option>
							<option value="id_ID" lang="id" {{$settings_language_val=='id_ID' ? "selected='selected'" : ''}}>Bahasa Indonesia</option>
							<option value="is_IS" lang="is" {{$settings_language_val=='is_IS' ? "selected='selected'" : ''}}>Íslenska</option>
							<option value="it_IT" lang="it" {{$settings_language_val=='it_IT' ? "selected='selected'" : ''}}>Italiano</option>
							<option value="ja" lang="ja" {{$settings_language_val=='ja' ? "selected='selected'" : ''}}>日本語</option>
							<option value="jv_ID" lang="jv" {{$settings_language_val=='jv_ID' ? "selected='selected'" : ''}}>Basa Jawa</option>
							<option value="ka_GE" lang="ka" {{$settings_language_val=='ka_GE' ? "selected='selected'" : ''}}>ქართული</option>
							<option value="kab" lang="kab" {{$settings_language_val=='kab' ? "selected='selected'" : ''}}>Taqbaylit</option>
							<option value="kk" lang="kk" {{$settings_language_val=='kk' ? "selected='selected'" : ''}}>Қазақ тілі</option>
							<option value="km" lang="km" {{$settings_language_val=='km' ? "selected='selected'" : ''}}>ភាសាខ្មែរ</option>
							<option value="kn" lang="kn" {{$settings_language_val=='kn' ? "selected='selected'" : ''}}>ಕನ್ನಡ</option>
							<option value="ko_KR" lang="ko" {{$settings_language_val=='ko_KR' ? "selected='selected'" : ''}}>한국어</option>
							<option value="ckb" lang="ku" {{$settings_language_val=='ckb' ? "selected='selected'" : ''}}>كوردی</option>
							<option value="lo" lang="lo" {{$settings_language_val=='lo' ? "selected='selected'" : ''}}>ພາສາລາວ</option>
							<option value="lt_LT" lang="lt" {{$settings_language_val=='lt_LT' ? "selected='selected'" : ''}}>Lietuvių kalba</option>
							<option value="lv" lang="lv" {{$settings_language_val=='lv' ? "selected='selected'" : ''}}>Latviešu valoda</option>
							<option value="mk_MK" lang="mk" {{$settings_language_val=='mk_MK' ? "selected='selected'" : ''}}>Македонски јазик</option>
							<option value="ml_IN" lang="ml" {{$settings_language_val=='ml_IN' ? "selected='selected'" : ''}}>മലയാളം</option>
							<option value="mn" lang="mn" {{$settings_language_val=='mn' ? "selected='selected'" : ''}}>Монгол</option>
							<option value="mr" lang="mr" {{$settings_language_val=='mr' ? "selected='selected'" : ''}}>मराठी</option>
							<option value="ms_MY" lang="ms" {{$settings_language_val=='ms_MY' ? "selected='selected'" : ''}}>Bahasa Melayu</option>
							<option value="my_MM" lang="my" {{$settings_language_val=='my_MM' ? "selected='selected'" : ''}}>ဗမာစာ</option>
							<option value="nb_NO" lang="nb" {{$settings_language_val=='nb_NO' ? "selected='selected'" : ''}}>Norsk bokmål</option>
							<option value="ne_NP" lang="ne" {{$settings_language_val=='ne_NP' ? "selected='selected'" : ''}}>नेपाली</option>
							<option value="nl_BE" lang="nl" {{$settings_language_val=='nl_BE' ? "selected='selected'" : ''}}>Nederlands (België)</option>
							<option value="nl_NL" lang="nl" {{$settings_language_val=='nl_NL' ? "selected='selected'" : ''}}>Nederlands</option>
							<option value="nl_NL_formal" lang="nl" {{$settings_language_val=='nl_NL_formal' ? "selected='selected'" : ''}}>Nederlands (Formeel)</option>
							<option value="nn_NO" lang="nn" {{$settings_language_val=='nn_NO' ? "selected='selected'" : ''}}>Norsk nynorsk</option>
							<option value="oci" lang="oc" {{$settings_language_val=='oci' ? "selected='selected'" : ''}}>Occitan</option>
							<option value="pa_IN" lang="pa" {{$settings_language_val=='pa_IN' ? "selected='selected'" : ''}}>ਪੰਜਾਬੀ</option>
							<option value="pl_PL" lang="pl" {{$settings_language_val=='pl_PL' ? "selected='selected'" : ''}}>Polski</option>
							<option value="ps" lang="ps" {{$settings_language_val=='ps' ? "selected='selected'" : ''}}>پښتو</option>
							<option value="pt_AO" lang="pt" {{$settings_language_val=='pt_AO' ? "selected='selected'" : ''}}>Português de Angola</option>
							<option value="pt_BR" lang="pt" {{$settings_language_val=='pt_BR' ? "selected='selected'" : ''}}>Português do Brasil</option>
							<option value="pt_PT" lang="pt" {{$settings_language_val=='pt_PT' ? "selected='selected'" : ''}}>Português</option>
							<option value="pt_PT_ao90" lang="pt" {{$settings_language_val=='pt_PT_ao90' ? "selected='selected'" : ''}}>Português (AO90)</option>
							<option value="rhg" lang="rhg" {{$settings_language_val=='rhg' ? "selected='selected'" : ''}}>Ruáinga</option>
							<option value="ro_RO" lang="ro" {{$settings_language_val=='ro_RO' ? "selected='selected'" : ''}}>Română</option>
							<option value="ru_RU" lang="ru" {{$settings_language_val=='ru_RU' ? "selected='selected'" : ''}}>Русский</option>
							<option value="sah" lang="sah" {{$settings_language_val=='sah' ? "selected='selected'" : ''}}>Сахалыы</option>
							<option value="si_LK" lang="si" {{$settings_language_val=='si_LK' ? "selected='selected'" : ''}}>සිංහල</option>
							<option value="sk_SK" lang="sk" {{$settings_language_val=='sk_SK' ? "selected='selected'" : ''}}>Slovenčina</option>
							<option value="skr" lang="skr" {{$settings_language_val=='skr' ? "selected='selected'" : ''}}>سرائیکی</option>
							<option value="sl_SI" lang="sl" {{$settings_language_val=='sl_SI' ? "selected='selected'" : ''}}>Slovenščina</option>
							<option value="sq" lang="sq" {{$settings_language_val=='sq' ? "selected='selected'" : ''}}>Shqip</option>
							<option value="sr_RS" lang="sr" {{$settings_language_val=='sr_RS' ? "selected='selected'" : ''}}>Српски језик</option>
							<option value="sv_SE" lang="sv" {{$settings_language_val=='sv_SE' ? "selected='selected'" : ''}}>Svenska</option>
							<option value="szl" lang="szl" {{$settings_language_val=='szl' ? "selected='selected'" : ''}}>Ślōnskŏ gŏdka</option>
							<option value="ta_IN" lang="ta" {{$settings_language_val=='ta_IN' ? "selected='selected'" : ''}}>தமிழ்</option>
							<option value="te" lang="te" {{$settings_language_val=='te' ? "selected='selected'" : ''}}>తెలుగు</option>
							<option value="th" lang="th" {{$settings_language_val=='th' ? "selected='selected'" : ''}}>ไทย</option>
							<option value="tl" lang="tl" {{$settings_language_val=='tl' ? "selected='selected'" : ''}}>Tagalog</option>
							<option value="tr_TR" lang="tr" {{$settings_language_val=='tr_TR' ? "selected='selected'" : ''}}>Türkçe</option>
							<option value="tt_RU" lang="tt" {{$settings_language_val=='tt_RU' ? "selected='selected'" : ''}}>Татар теле</option>
							<option value="tah" lang="ty" {{$settings_language_val=='tah' ? "selected='selected'" : ''}}>Reo Tahiti</option>
							<option value="ug_CN" lang="ug" {{$settings_language_val=='ug_CN' ? "selected='selected'" : ''}}>ئۇيغۇرچە</option>
							<option value="uk" lang="uk" {{$settings_language_val=='uk' ? "selected='selected'" : ''}}>Українська</option>
							<option value="ur" lang="ur" {{$settings_language_val=='ur' ? "selected='selected'" : ''}}>اردو</option>
							<option value="uz_UZ" lang="uz" {{$settings_language_val=='uz_UZ' ? "selected='selected'" : ''}}>O‘zbekcha</option>
							<option value="vi" lang="vi" {{$settings_language_val=='vi' ? "selected='selected'" : ''}}>Tiếng Việt</option>
							<option value="zh_HK" lang="zh" {{$settings_language_val=='zh_HK' ? "selected='selected'" : ''}}>香港中文版	</option>
							<option value="zh_CN" lang="zh" {{$settings_language_val=='zh_CN' ? "selected='selected'" : ''}}>简体中文</option>
							<option value="zh_TW" lang="zh" {{$settings_language_val=='zh_TW' ? "selected='selected'" : ''}}>繁體中文</option>
                        </select>
                            @else
                            <input class="form-control" name="language" style="width:200px" value="{{ $settings_language_val }}" readonly>
                        @endif
						    @error('language')
						       <span class="invalid-feedback text-danger" role="alert">
						           <strong>{{ $message }}</strong>
						       </span>
						   @enderror
						</div>
					</div>

					<div class="col-md-1">
						<label for="timezone">{{__('messages.time_zone')}}</label>
					</div>
					<div class="col-md-11">
						<div class="form-group">
                            @if(Auth::user()->type==1)
							<select class="form-control" id="timezone" name="timezone" data-old="" style="width:200px">
								<optgroup label="Africa">
								<option value="Africa/Abidjan" {{$settings_timezone_val=='Africa/Abidjan' ? "selected='selected'" : ''}}>Abidjan</option>
								<option value="Africa/Accra" {{$settings_timezone_val=='Africa/Accra' ? "selected='selected'" : ''}}>Accra</option>
								<option value="Africa/Addis_Ababa" {{$settings_timezone_val=='Africa/Addis_Ababa' ? "selected='selected'" : ''}}>Addis Ababa</option>
								<option value="Africa/Algiers" {{$settings_timezone_val=='Africa/Algiers' ? "selected='selected'" : ''}}>Algiers</option>
								<option value="Africa/Asmara" {{$settings_timezone_val=='Africa/Asmara' ? "selected='selected'" : ''}}>Asmara</option>
								<option value="Africa/Bamako" {{$settings_timezone_val=='Africa/Bamako' ? "selected='selected'" : ''}}>Bamako</option>
								<option value="Africa/Bangui" {{$settings_timezone_val=='Africa/Bangui' ? "selected='selected'" : ''}}>Bangui</option>
								<option value="Africa/Banjul" {{$settings_timezone_val=='Africa/Banjul' ? "selected='selected'" : ''}}>Banjul</option>
								<option value="Africa/Bissau" {{$settings_timezone_val=='Africa/Bissau' ? "selected='selected'" : ''}}>Bissau</option>
								<option value="Africa/Blantyre" {{$settings_timezone_val=='Africa/Blantyre' ? "selected='selected'" : ''}}>Blantyre</option>
								<option value="Africa/Brazzaville" {{$settings_timezone_val=='Africa/Brazzaville' ? "selected='selected'" : ''}}>Brazzaville</option>
								<option value="Africa/Bujumbura" {{$settings_timezone_val=='Africa/Bujumbura' ? "selected='selected'" : ''}}>Bujumbura</option>
								<option value="Africa/Cairo" {{$settings_timezone_val=='Africa/Cairo' ? "selected='selected'" : ''}}>Cairo</option>
								<option value="Africa/Casablanca" {{$settings_timezone_val=='Africa/Casablanca' ? "selected='selected'" : ''}}>Casablanca</option>
								<option value="Africa/Ceuta" {{$settings_timezone_val=='Africa/Ceuta' ? "selected='selected'" : ''}}>Ceuta</option>
								<option value="Africa/Conakry" {{$settings_timezone_val=='Africa/Conakry' ? "selected='selected'" : ''}}>Conakry</option>
								<option value="Africa/Dakar" {{$settings_timezone_val=='Africa/Dakar' ? "selected='selected'" : ''}}>Dakar</option>
								<option value="Africa/Dar_es_Salaam" {{$settings_timezone_val=='Africa/Dar_es_Salaam' ? "selected='selected'" : ''}}>Dar es Salaam</option>
								<option value="Africa/Djibouti" {{$settings_timezone_val=='Africa/Djibouti' ? "selected='selected'" : ''}}>Djibouti</option>
								<option value="Africa/Douala" {{$settings_timezone_val=='Africa/Douala' ? "selected='selected'" : ''}}>Douala</option>
								<option value="Africa/El_Aaiun" {{$settings_timezone_val=='Africa/El_Aaiun' ? "selected='selected'" : ''}}>El Aaiun</option>
								<option value="Africa/Freetown" {{$settings_timezone_val=='Africa/Freetown' ? "selected='selected'" : ''}}>Freetown</option>
								<option value="Africa/Gaborone" {{$settings_timezone_val=='Africa/Gaborone' ? "selected='selected'" : ''}}>Gaborone</option>
								<option value="Africa/Harare" {{$settings_timezone_val=='Africa/Harare' ? "selected='selected'" : ''}}>Harare</option>
								<option value="Africa/Johannesburg" {{$settings_timezone_val=='Africa/Johannesburg' ? "selected='selected'" : ''}}>Johannesburg</option>
								<option value="Africa/Juba" {{$settings_timezone_val=='Africa/Juba' ? "selected='selected'" : ''}}>Juba</option>
								<option value="Africa/Kampala" {{$settings_timezone_val=='Africa/Kampala' ? "selected='selected'" : ''}}>Kampala</option>
								<option value="Africa/Khartoum" {{$settings_timezone_val=='Africa/Khartoum' ? "selected='selected'" : ''}}>Khartoum</option>
								<option value="Africa/Kigali" {{$settings_timezone_val=='Africa/Kigali' ? "selected='selected'" : ''}}>Kigali</option>
								<option value="Africa/Kinshasa" {{$settings_timezone_val=='Africa/Kinshasa' ? "selected='selected'" : ''}}>Kinshasa</option>
								<option value="Africa/Lagos" {{$settings_timezone_val=='Africa/Lagos' ? "selected='selected'" : ''}}>Lagos</option>
								<option value="Africa/Libreville" {{$settings_timezone_val=='Africa/Libreville' ? "selected='selected'" : ''}}>Libreville</option>
								<option value="Africa/Lome" {{$settings_timezone_val=='Africa/Lome' ? "selected='selected'" : ''}}>Lome</option>
								<option value="Africa/Luanda" {{$settings_timezone_val=='Africa/Luanda' ? "selected='selected'" : ''}}>Luanda</option>
								<option value="Africa/Lubumbashi" {{$settings_timezone_val=='Africa/Lubumbashi' ? "selected='selected'" : ''}}>Lubumbashi</option>
								<option value="Africa/Lusaka" {{$settings_timezone_val=='Africa/Lusaka' ? "selected='selected'" : ''}}>Lusaka</option>
								<option value="Africa/Malabo" {{$settings_timezone_val=='Africa/Malabo' ? "selected='selected'" : ''}}>Malabo</option>
								<option value="Africa/Maputo" {{$settings_timezone_val=='Africa/Maputo' ? "selected='selected'" : ''}}>Maputo</option>
								<option value="Africa/Maseru" {{$settings_timezone_val=='Africa/Maseru' ? "selected='selected'" : ''}}>Maseru</option>
								<option value="Africa/Mbabane" {{$settings_timezone_val=='Africa/Mbabane' ? "selected='selected'" : ''}}>Mbabane</option>
								<option value="Africa/Mogadishu" {{$settings_timezone_val=='Africa/Mogadishu' ? "selected='selected'" : ''}}>Mogadishu</option>
								<option value="Africa/Monrovia" {{$settings_timezone_val=='Africa/Monrovia' ? "selected='selected'" : ''}}>Monrovia</option>
								<option value="Africa/Nairobi" {{$settings_timezone_val=='Africa/Nairobi' ? "selected='selected'" : ''}}>Nairobi</option>
								<option value="Africa/Ndjamena" {{$settings_timezone_val=='Africa/Ndjamena' ? "selected='selected'" : ''}}>Ndjamena</option>
								<option value="Africa/Niamey" {{$settings_timezone_val=='Africa/Niamey' ? "selected='selected'" : ''}}>Niamey</option>
								<option value="Africa/Nouakchott" {{$settings_timezone_val=='Africa/Nouakchott' ? "selected='selected'" : ''}}>Nouakchott</option>
								<option value="Africa/Ouagadougou" {{$settings_timezone_val=='Africa/Ouagadougou' ? "selected='selected'" : ''}}>Ouagadougou</option>
								<option value="Africa/Porto-Novo" {{$settings_timezone_val=='Africa/Porto-Novo' ? "selected='selected'" : ''}}>Porto-Novo</option>
								<option value="Africa/Sao_Tome" {{$settings_timezone_val=='Africa/Sao_Tome' ? "selected='selected'" : ''}}>Sao Tome</option>
								<option value="Africa/Tripoli" {{$settings_timezone_val=='Africa/Tripoli' ? "selected='selected'" : ''}}>Tripoli</option>
								<option value="Africa/Tunis" {{$settings_timezone_val=='Africa/Tunis' ? "selected='selected'" : ''}}>Tunis</option>
								<option value="Africa/Windhoek" {{$settings_timezone_val=='Africa/Windhoek' ? "selected='selected'" : ''}}>Windhoek</option>
								</optgroup>
								<optgroup label="America">
								<option value="America/Adak" {{$settings_timezone_val=='America/Adak' ? "selected='selected'" : ''}}>Adak</option>
								<option value="America/Anchorage" {{$settings_timezone_val=='America/Anchorage' ? "selected='selected'" : ''}}>Anchorage</option>
								<option value="America/Anguilla" {{$settings_timezone_val=='America/Anguilla' ? "selected='selected'" : ''}}>Anguilla</option>
								<option value="America/Antigua" {{$settings_timezone_val=='America/Antigua' ? "selected='selected'" : ''}}>Antigua</option>
								<option value="America/Araguaina" {{$settings_timezone_val=='America/Araguaina' ? "selected='selected'" : ''}}>Araguaina</option>
								<option value="America/Argentina/Buenos_Aires" {{$settings_timezone_val=='America/Argentina/Buenos_Aires' ? "selected='selected'" : ''}}>Argentina - Buenos Aires</option>
								<option value="America/Argentina/Catamarca" {{$settings_timezone_val=='America/Argentina/Catamarca' ? "selected='selected'" : ''}}>Argentina - Catamarca</option>
								<option value="America/Argentina/Cordoba" {{$settings_timezone_val=='America/Argentina/Cordoba' ? "selected='selected'" : ''}}>Argentina - Cordoba</option>
								<option value="America/Argentina/Jujuy" {{$settings_timezone_val=='America/Argentina/Jujuy' ? "selected='selected'" : ''}}>Argentina - Jujuy</option>
								<option value="America/Argentina/La_Rioja" {{$settings_timezone_val=='America/Argentina/La_Rioja' ? "selected='selected'" : ''}}>Argentina - La Rioja</option>
								<option value="America/Argentina/Mendoza" {{$settings_timezone_val=='America/Argentina/Mendoza' ? "selected='selected'" : ''}}>Argentina - Mendoza</option>
								<option value="America/Argentina/Rio_Gallegos" {{$settings_timezone_val=='America/Argentina/Rio_Gallegos' ? "selected='selected'" : ''}}>Argentina - Rio Gallegos</option>
								<option value="America/Argentina/Salta" {{$settings_timezone_val=='America/Argentina/Salta' ? "selected='selected'" : ''}}>Argentina - Salta</option>
								<option value="America/Argentina/San_Juan" {{$settings_timezone_val=='America/Argentina/San_Juan' ? "selected='selected'" : ''}}>Argentina - San Juan</option>
								<option value="America/Argentina/San_Luis" {{$settings_timezone_val=='America/Argentina/San_Luis' ? "selected='selected'" : ''}}>Argentina - San Luis</option>
								<option value="America/Argentina/Tucuman" {{$settings_timezone_val=='America/Argentina/Tucuman' ? "selected='selected'" : ''}}>Argentina - Tucuman</option>
								<option value="America/Argentina/Ushuaia" {{$settings_timezone_val=='America/Argentina/Ushuaia' ? "selected='selected'" : ''}}>Argentina - Ushuaia</option>
								<option value="America/Aruba" {{$settings_timezone_val=='America/Aruba' ? "selected='selected'" : ''}}>Aruba</option>
								<option value="America/Asuncion" {{$settings_timezone_val=='America/Asuncion' ? "selected='selected'" : ''}}>Asuncion</option>
								<option value="America/Atikokan" {{$settings_timezone_val=='America/Atikokan' ? "selected='selected'" : ''}}>Atikokan</option>
								<option value="America/Bahia" {{$settings_timezone_val=='America/Bahia' ? "selected='selected'" : ''}}>Bahia</option>
								<option value="America/Bahia_Banderas" {{$settings_timezone_val=='America/Bahia_Banderas' ? "selected='selected'" : ''}}>Bahia Banderas</option>
								<option value="America/Barbados" {{$settings_timezone_val=='America/Barbados' ? "selected='selected'" : ''}}>Barbados</option>
								<option value="America/Belem" {{$settings_timezone_val=='America/Belem' ? "selected='selected'" : ''}}>Belem</option>
								<option value="America/Belize" {{$settings_timezone_val=='America/Belize' ? "selected='selected'" : ''}}>Belize</option>
								<option value="America/Blanc-Sablon" {{$settings_timezone_val=='America/Blanc-Sablon' ? "selected='selected'" : ''}}>Blanc-Sablon</option>
								<option value="America/Boa_Vista" {{$settings_timezone_val=='America/Boa_Vista' ? "selected='selected'" : ''}}>Boa Vista</option>
								<option value="America/Bogota" {{$settings_timezone_val=='America/Bogota' ? "selected='selected'" : ''}}>Bogota</option>
								<option value="America/Boise" {{$settings_timezone_val=='America/Boise' ? "selected='selected'" : ''}}>Boise</option>
								<option value="America/Cambridge_Bay" {{$settings_timezone_val=='America/Cambridge_Bay' ? "selected='selected'" : ''}}>Cambridge Bay</option>
								<option value="America/Campo_Grande" {{$settings_timezone_val=='America/Campo_Grande' ? "selected='selected'" : ''}}>Campo Grande</option>
								<option value="America/Cancun" {{$settings_timezone_val=='America/Cancun' ? "selected='selected'" : ''}}>Cancun</option>
								<option value="America/Caracas" {{$settings_timezone_val=='America/Caracas' ? "selected='selected'" : ''}}>Caracas</option>
								<option value="America/Cayenne" {{$settings_timezone_val=='America/Cayenne' ? "selected='selected'" : ''}}>Cayenne</option>
								<option value="America/Cayman" {{$settings_timezone_val=='America/Cayman' ? "selected='selected'" : ''}}>Cayman</option>
								<option value="America/Chicago" {{$settings_timezone_val=='America/Chicago' ? "selected='selected'" : ''}}>Chicago</option>
								<option value="America/Chihuahua" {{$settings_timezone_val=='America/Chihuahua' ? "selected='selected'" : ''}}>Chihuahua</option>
								<option value="America/Costa_Rica" {{$settings_timezone_val=='America/Costa_Rica' ? "selected='selected'" : ''}}>Costa Rica</option>
								<option value="America/Creston" {{$settings_timezone_val=='America/Creston' ? "selected='selected'" : ''}}>Creston</option>
								<option value="America/Cuiaba" {{$settings_timezone_val=='America/Cuiaba' ? "selected='selected'" : ''}}>Cuiaba</option>
								<option value="America/Curacao" {{$settings_timezone_val=='America/Curacao' ? "selected='selected'" : ''}}>Curacao</option>
								<option value="America/Danmarkshavn" {{$settings_timezone_val=='America/Danmarkshavn' ? "selected='selected'" : ''}}>Danmarkshavn</option>
								<option value="America/Dawson" {{$settings_timezone_val=='America/Dawson' ? "selected='selected'" : ''}}>Dawson</option>
								<option value="America/Dawson_Creek" {{$settings_timezone_val=='America/Dawson_Creek' ? "selected='selected'" : ''}}>Dawson Creek</option>
								<option value="America/Denver" {{$settings_timezone_val=='America/Denver' ? "selected='selected'" : ''}}>Denver</option>
								<option value="America/Detroit" {{$settings_timezone_val=='America/Detroit' ? "selected='selected'" : ''}}>Detroit</option>
								<option value="America/Dominica" {{$settings_timezone_val=='America/Dominica' ? "selected='selected'" : ''}}>Dominica</option>
								<option value="America/Edmonton" {{$settings_timezone_val=='America/Edmonton' ? "selected='selected'" : ''}}>Edmonton</option>
								<option value="America/Eirunepe" {{$settings_timezone_val=='America/Eirunepe' ? "selected='selected'" : ''}}>Eirunepe</option>
								<option value="America/El_Salvador" {{$settings_timezone_val=='America/El_Salvador' ? "selected='selected'" : ''}}>El Salvador</option>
								<option value="America/Fortaleza" {{$settings_timezone_val=='America/Fortaleza' ? "selected='selected'" : ''}}>Fortaleza</option>
								<option value="America/Fort_Nelson" {{$settings_timezone_val=='America/Fort_Nelson' ? "selected='selected'" : ''}}>Fort Nelson</option>
								<option value="America/Glace_Bay" {{$settings_timezone_val=='America/Glace_Bay' ? "selected='selected'" : ''}}>Glace Bay</option>
								<option value="America/Godthab" {{$settings_timezone_val=='America/Godthab' ? "selected='selected'" : ''}}>Godthab</option>
								<option value="America/Goose_Bay" {{$settings_timezone_val=='America/Goose_Bay' ? "selected='selected'" : ''}}>Goose Bay</option>
								<option value="America/Grand_Turk" {{$settings_timezone_val=='America/Grand_Turk' ? "selected='selected'" : ''}}>Grand Turk</option>
								<option value="America/Grenada" {{$settings_timezone_val=='America/Grenada' ? "selected='selected'" : ''}}>Grenada</option>
								<option value="America/Guadeloupe" {{$settings_timezone_val=='America/Guadeloupe' ? "selected='selected'" : ''}}>Guadeloupe</option>
								<option value="America/Guatemala" {{$settings_timezone_val=='America/Guatemala' ? "selected='selected'" : ''}}>Guatemala</option>
								<option value="America/Guayaquil" {{$settings_timezone_val=='America/Guayaquil' ? "selected='selected'" : ''}}>Guayaquil</option>
								<option value="America/Guyana" {{$settings_timezone_val=='America/Guyana' ? "selected='selected'" : ''}}>Guyana</option>
								<option value="America/Halifax" {{$settings_timezone_val=='America/Halifax' ? "selected='selected'" : ''}}>Halifax</option>
								<option value="America/Havana" {{$settings_timezone_val=='America/Havana' ? "selected='selected'" : ''}}>Havana</option>
								<option value="America/Hermosillo" {{$settings_timezone_val=='America/Hermosillo' ? "selected='selected'" : ''}}>Hermosillo</option>
								<option value="America/Indiana/Indianapolis" {{$settings_timezone_val=='America/Indiana/Indianapolis' ? "selected='selected'" : ''}}>Indiana - Indianapolis</option>
								<option value="America/Indiana/Knox" {{$settings_timezone_val=='America/Indiana/Knox' ? "selected='selected'" : ''}}>Indiana - Knox</option>
								<option value="America/Indiana/Marengo" {{$settings_timezone_val=='America/Indiana/Marengo' ? "selected='selected'" : ''}}>Indiana - Marengo</option>
								<option value="America/Indiana/Petersburg" {{$settings_timezone_val=='America/Indiana/Petersburg' ? "selected='selected'" : ''}}>Indiana - Petersburg</option>
								<option value="America/Indiana/Tell_City" {{$settings_timezone_val=='America/Indiana/Tell_City' ? "selected='selected'" : ''}}>Indiana - Tell City</option>
								<option value="America/Indiana/Vevay" {{$settings_timezone_val=='America/Indiana/Vevay' ? "selected='selected'" : ''}}>Indiana - Vevay</option>
								<option value="America/Indiana/Vincennes" {{$settings_timezone_val=='America/Indiana/Vincennes' ? "selected='selected'" : ''}}>Indiana - Vincennes</option>
								<option value="America/Indiana/Winamac" {{$settings_timezone_val=='America/Indiana/Winamac' ? "selected='selected'" : ''}}>Indiana - Winamac</option>
								<option value="America/Inuvik" {{$settings_timezone_val=='America/Inuvik' ? "selected='selected'" : ''}}>Inuvik</option>
								<option value="America/Iqaluit" {{$settings_timezone_val=='America/Iqaluit' ? "selected='selected'" : ''}}>Iqaluit</option>
								<option value="America/Jamaica" {{$settings_timezone_val=='America/Jamaica' ? "selected='selected'" : ''}}>Jamaica</option>
								<option value="America/Juneau" {{$settings_timezone_val=='America/Juneau' ? "selected='selected'" : ''}}>Juneau</option>
								<option value="America/Kentucky/Louisville" {{$settings_timezone_val=='America/Kentucky/Louisville' ? "selected='selected'" : ''}}>Kentucky - Louisville</option>
								<option value="America/Kentucky/Monticello" {{$settings_timezone_val=='America/Kentucky/Monticello' ? "selected='selected'" : ''}}>Kentucky - Monticello</option>
								<option value="America/Kralendijk" {{$settings_timezone_val=='America/Kralendijk' ? "selected='selected'" : ''}}>Kralendijk</option>
								<option value="America/La_Paz" {{$settings_timezone_val=='America/La_Paz' ? "selected='selected'" : ''}}>La Paz</option>
								<option value="America/Lima" {{$settings_timezone_val=='America/Lima' ? "selected='selected'" : ''}}>Lima</option>
								<option value="America/Los_Angeles" {{$settings_timezone_val=='America/Los_Angeles' ? "selected='selected'" : ''}}>Los Angeles</option>
								<option value="America/Lower_Princes" {{$settings_timezone_val=='America/Lower_Princes' ? "selected='selected'" : ''}}>Lower Princes</option>
								<option value="America/Maceio" {{$settings_timezone_val=='America/Maceio' ? "selected='selected'" : ''}}>Maceio</option>
								<option value="America/Managua" {{$settings_timezone_val=='America/Managua' ? "selected='selected'" : ''}}>Managua</option>
								<option value="America/Manaus" {{$settings_timezone_val=='America/Manaus' ? "selected='selected'" : ''}}>Manaus</option>
								<option value="America/Marigot" {{$settings_timezone_val=='America/Marigot' ? "selected='selected'" : ''}}>Marigot</option>
								<option value="America/Martinique" {{$settings_timezone_val=='America/Martinique' ? "selected='selected'" : ''}}>Martinique</option>
								<option value="America/Matamoros" {{$settings_timezone_val=='America/Matamoros' ? "selected='selected'" : ''}}>Matamoros</option>
								<option value="America/Mazatlan" {{$settings_timezone_val=='America/Mazatlan' ? "selected='selected'" : ''}}>Mazatlan</option>
								<option value="America/Menominee" {{$settings_timezone_val=='America/Menominee' ? "selected='selected'" : ''}}>Menominee</option>
								<option value="America/Merida" {{$settings_timezone_val=='America/Merida' ? "selected='selected'" : ''}}>Merida</option>
								<option value="America/Metlakatla" {{$settings_timezone_val=='America/Metlakatla' ? "selected='selected'" : ''}}>Metlakatla</option>
								<option value="America/Mexico_City" {{$settings_timezone_val=='America/Mexico_City' ? "selected='selected'" : ''}}>Mexico City</option>
								<option value="America/Miquelon" {{$settings_timezone_val=='America/Miquelon' ? "selected='selected'" : ''}}>Miquelon</option>
								<option value="America/Moncton" {{$settings_timezone_val=='America/Moncton' ? "selected='selected'" : ''}}>Moncton</option>
								<option value="America/Monterrey" {{$settings_timezone_val=='America/Monterrey' ? "selected='selected'" : ''}}>Monterrey</option>
								<option value="America/Montevideo" {{$settings_timezone_val=='America/Montevideo' ? "selected='selected'" : ''}}>Montevideo</option>
								<option value="America/Montserrat" {{$settings_timezone_val=='America/Montserrat' ? "selected='selected'" : ''}}>Montserrat</option>
								<option value="America/Nassau" {{$settings_timezone_val=='America/Nassau' ? "selected='selected'" : ''}}>Nassau</option>
								<option value="America/New_York" {{$settings_timezone_val=='America/New_York' ? "selected='selected'" : ''}}>New York</option>
								<option value="America/Nipigon" {{$settings_timezone_val=='America/Nipigon' ? "selected='selected'" : ''}}>Nipigon</option>
								<option value="America/Nome" {{$settings_timezone_val=='America/Nome' ? "selected='selected'" : ''}}>Nome</option>
								<option value="America/Noronha" {{$settings_timezone_val=='America/Noronha' ? "selected='selected'" : ''}}>Noronha</option>
								<option value="America/North_Dakota/Beulah" {{$settings_timezone_val=='America/North_Dakota/Beulah' ? "selected='selected'" : ''}}>North Dakota - Beulah</option>
								<option value="America/North_Dakota/Center" {{$settings_timezone_val=='America/North_Dakota/Center' ? "selected='selected'" : ''}}>North Dakota - Center</option>
								<option value="America/North_Dakota/New_Salem" {{$settings_timezone_val=='America/North_Dakota/New_Salem' ? "selected='selected'" : ''}}>North Dakota - New Salem</option>
								<option value="America/Ojinaga" {{$settings_timezone_val=='America/Ojinaga' ? "selected='selected'" : ''}}>Ojinaga</option>
								<option value="America/Panama" {{$settings_timezone_val=='America/Panama' ? "selected='selected'" : ''}}>Panama</option>
								<option value="America/Pangnirtung" {{$settings_timezone_val=='America/Pangnirtung' ? "selected='selected'" : ''}}>Pangnirtung</option>
								<option value="America/Paramaribo" {{$settings_timezone_val=='America/Paramaribo' ? "selected='selected'" : ''}}>Paramaribo</option>
								<option value="America/Phoenix" {{$settings_timezone_val=='America/Phoenix' ? "selected='selected'" : ''}}>Phoenix</option>
								<option value="America/Port-au-Prince" {{$settings_timezone_val=='America/Port-au-Prince' ? "selected='selected'" : ''}}>Port-au-Prince</option>
								<option value="America/Port_of_Spain" {{$settings_timezone_val=='America/Port_of_Spain' ? "selected='selected'" : ''}}>Port of Spain</option>
								<option value="America/Porto_Velho" {{$settings_timezone_val=='America/Porto_Velho' ? "selected='selected'" : ''}}>Porto Velho</option>
								<option value="America/Puerto_Rico" {{$settings_timezone_val=='America/Puerto_Rico' ? "selected='selected'" : ''}}>Puerto Rico</option>
								<option value="America/Punta_Arenas" {{$settings_timezone_val=='America/Punta_Arenas' ? "selected='selected'" : ''}}>Punta Arenas</option>
								<option value="America/Rainy_River" {{$settings_timezone_val=='America/Rainy_River' ? "selected='selected'" : ''}}>Rainy River</option>
								<option value="America/Rankin_Inlet" {{$settings_timezone_val=='America/Rankin_Inlet' ? "selected='selected'" : ''}}>Rankin Inlet</option>
								<option value="America/Recife" {{$settings_timezone_val=='America/Recife' ? "selected='selected'" : ''}}>Recife</option>
								<option value="America/Regina" {{$settings_timezone_val=='America/Regina' ? "selected='selected'" : ''}}>Regina</option>
								<option value="America/Resolute" {{$settings_timezone_val=='America/Resolute' ? "selected='selected'" : ''}}>Resolute</option>
								<option value="America/Rio_Branco" {{$settings_timezone_val=='America/Rio_Branco' ? "selected='selected'" : ''}}>Rio Branco</option>
								<option value="America/Santarem" {{$settings_timezone_val=='America/Santarem' ? "selected='selected'" : ''}}>Santarem</option>
								<option value="America/Santiago" {{$settings_timezone_val=='America/Santiago' ? "selected='selected'" : ''}}>Santiago</option>
								<option value="America/Santo_Domingo" {{$settings_timezone_val=='America/Santo_Domingo' ? "selected='selected'" : ''}}>Santo Domingo</option>
								<option value="America/Sao_Paulo" {{$settings_timezone_val=='America/Sao_Paulo' ? "selected='selected'" : ''}}>Sao Paulo</option>
								<option value="America/Scoresbysund" {{$settings_timezone_val=='America/Scoresbysund' ? "selected='selected'" : ''}}>Scoresbysund</option>
								<option value="America/Sitka" {{$settings_timezone_val=='America/Sitka' ? "selected='selected'" : ''}}>Sitka</option>
								<option value="America/St_Barthelemy" {{$settings_timezone_val=='America/St_Barthelemy' ? "selected='selected'" : ''}}>St Barthelemy</option>
								<option value="America/St_Johns" {{$settings_timezone_val=='America/St_Johns' ? "selected='selected'" : ''}}>St Johns</option>
								<option value="America/St_Kitts" {{$settings_timezone_val=='America/St_Kitts' ? "selected='selected'" : ''}}>St Kitts</option>
								<option value="America/St_Lucia" {{$settings_timezone_val=='America/St_Lucia' ? "selected='selected'" : ''}}>St Lucia</option>
								<option value="America/St_Thomas" {{$settings_timezone_val=='America/St_Thomas' ? "selected='selected'" : ''}}>St Thomas</option>
								<option value="America/St_Vincent" {{$settings_timezone_val=='America/St_Vincent' ? "selected='selected'" : ''}}>St Vincent</option>
								<option value="America/Swift_Current" {{$settings_timezone_val=='America/Swift_Current' ? "selected='selected'" : ''}}>Swift Current</option>
								<option value="America/Tegucigalpa" {{$settings_timezone_val=='America/Tegucigalpa' ? "selected='selected'" : ''}}>Tegucigalpa</option>
								<option value="America/Thule" {{$settings_timezone_val=='America/Thule' ? "selected='selected'" : ''}}>Thule</option>
								<option value="America/Thunder_Bay" {{$settings_timezone_val=='America/Thunder_Bay' ? "selected='selected'" : ''}}>Thunder Bay</option>
								<option value="America/Tijuana" {{$settings_timezone_val=='America/Tijuana' ? "selected='selected'" : ''}}>Tijuana</option>
								<option value="America/Toronto" {{$settings_timezone_val=='America/Toronto' ? "selected='selected'" : ''}}>Toronto</option>
								<option value="America/Tortola" {{$settings_timezone_val=='America/Tortola' ? "selected='selected'" : ''}}>Tortola</option>
								<option value="America/Vancouver" {{$settings_timezone_val=='America/Vancouver' ? "selected='selected'" : ''}}>Vancouver</option>
								<option value="America/Whitehorse" {{$settings_timezone_val=='America/Whitehorse' ? "selected='selected'" : ''}}>Whitehorse</option>
								<option value="America/Winnipeg" {{$settings_timezone_val=='America/Winnipeg' ? "selected='selected'" : ''}}>Winnipeg</option>
								<option value="America/Yakutat" {{$settings_timezone_val=='America/Yakutat' ? "selected='selected'" : ''}}>Yakutat</option>
								<option value="America/Yellowknife" {{$settings_timezone_val=='America/Yellowknife' ? "selected='selected'" : ''}}>Yellowknife</option>
								</optgroup>
								<optgroup label="Antarctica">
								<option value="Antarctica/Casey" {{$settings_timezone_val=='Antarctica/Casey' ? "selected='selected'" : ''}}>Casey</option>
								<option value="Antarctica/Davis" {{$settings_timezone_val=='Antarctica/Davis' ? "selected='selected'" : ''}}>Davis</option>
								<option value="Antarctica/DumontDUrville" {{$settings_timezone_val=='Antarctica/DumontDUrville' ? "selected='selected'" : ''}}>DumontDUrville</option>
								<option value="Antarctica/Macquarie" {{$settings_timezone_val=='Antarctica/Macquarie' ? "selected='selected'" : ''}}>Macquarie</option>
								<option value="Antarctica/Mawson" {{$settings_timezone_val=='Antarctica/Mawson' ? "selected='selected'" : ''}}>Mawson</option>
								<option value="Antarctica/McMurdo" {{$settings_timezone_val=='Antarctica/McMurdo' ? "selected='selected'" : ''}}>McMurdo</option>
								<option value="Antarctica/Palmer" {{$settings_timezone_val=='Antarctica/Palmer' ? "selected='selected'" : ''}}>Palmer</option>
								<option value="Antarctica/Rothera" {{$settings_timezone_val=='Antarctica/Rothera' ? "selected='selected'" : ''}}>Rothera</option>
								<option value="Antarctica/Syowa" {{$settings_timezone_val=='Antarctica/Syowa' ? "selected='selected'" : ''}}>Syowa</option>
								<option value="Antarctica/Troll" {{$settings_timezone_val=='Antarctica/Troll' ? "selected='selected'" : ''}}>Troll</option>
								<option value="Antarctica/Vostok" {{$settings_timezone_val=='Antarctica/Vostok' ? "selected='selected'" : ''}}>Vostok</option>
								</optgroup>
								<optgroup label="Arctic">
								<option value="Arctic/Longyearbyen" {{$settings_timezone_val=='Arctic/Longyearbyen' ? "selected='selected'" : ''}}>Longyearbyen</option>
								</optgroup>
								<optgroup label="Asia">
								<option value="Asia/Aden" {{$settings_timezone_val=='Asia/Aden' ? "selected='selected'" : ''}}>Aden</option>
								<option value="Asia/Almaty" {{$settings_timezone_val=='Asia/Almaty' ? "selected='selected'" : ''}}>Almaty</option>
								<option value="Asia/Amman" {{$settings_timezone_val=='Asia/Amman' ? "selected='selected'" : ''}}>Amman</option>
								<option value="Asia/Anadyr" {{$settings_timezone_val=='Asia/Anadyr' ? "selected='selected'" : ''}}>Anadyr</option>
								<option value="Asia/Aqtau" {{$settings_timezone_val=='Asia/Aqtau' ? "selected='selected'" : ''}}>Aqtau</option>
								<option value="Asia/Aqtobe" {{$settings_timezone_val=='Asia/Aqtobe' ? "selected='selected'" : ''}}>Aqtobe</option>
								<option value="Asia/Ashgabat" {{$settings_timezone_val=='Asia/Ashgabat' ? "selected='selected'" : ''}}>Ashgabat</option>
								<option value="Asia/Atyrau" {{$settings_timezone_val=='Asia/Atyrau' ? "selected='selected'" : ''}}>Atyrau</option>
								<option value="Asia/Baghdad" {{$settings_timezone_val=='Asia/Baghdad' ? "selected='selected'" : ''}}>Baghdad</option>
								<option value="Asia/Bahrain" {{$settings_timezone_val=='Asia/Bahrain' ? "selected='selected'" : ''}}>Bahrain</option>
								<option value="Asia/Baku" {{$settings_timezone_val=='Asia/Baku' ? "selected='selected'" : ''}}>Baku</option>
								<option value="Asia/Bangkok" {{$settings_timezone_val=='Asia/Bangkok' ? "selected='selected'" : ''}}>Bangkok</option>
								<option value="Asia/Barnaul" {{$settings_timezone_val=='Asia/Barnaul' ? "selected='selected'" : ''}}>Barnaul</option>
								<option value="Asia/Beirut" {{$settings_timezone_val=='Asia/Beirut' ? "selected='selected'" : ''}}>Beirut</option>
								<option value="Asia/Bishkek" {{$settings_timezone_val=='Asia/Bishkek' ? "selected='selected'" : ''}}>Bishkek</option>
								<option value="Asia/Brunei" {{$settings_timezone_val=='Asia/Brunei' ? "selected='selected'" : ''}}>Brunei</option>
								<option value="Asia/Chita" {{$settings_timezone_val=='Asia/Chita' ? "selected='selected'" : ''}}>Chita</option>
								<option value="Asia/Choibalsan" {{$settings_timezone_val=='Asia/Choibalsan' ? "selected='selected'" : ''}}>Choibalsan</option>
								<option value="Asia/Colombo" {{$settings_timezone_val=='Asia/Colombo' ? "selected='selected'" : ''}}>Colombo</option>
								<option value="Asia/Damascus" {{$settings_timezone_val=='Asia/Damascus' ? "selected='selected'" : ''}}>Damascus</option>
								<option value="Asia/Dhaka" {{$settings_timezone_val=='Asia/Dhaka' ? "selected='selected'" : ''}}>Dhaka</option>
								<option value="Asia/Dili" {{$settings_timezone_val=='Asia/Dili' ? "selected='selected'" : ''}}>Dili</option>
								<option value="Asia/Dubai" {{$settings_timezone_val=='Asia/Dubai' ? "selected='selected'" : ''}}>Dubai</option>
								<option value="Asia/Dushanbe" {{$settings_timezone_val=='Asia/Dushanbe' ? "selected='selected'" : ''}}>Dushanbe</option>
								<option value="Asia/Famagusta" {{$settings_timezone_val=='Asia/Famagusta' ? "selected='selected'" : ''}}>Famagusta</option>
								<option value="Asia/Gaza" {{$settings_timezone_val=='Asia/Gaza' ? "selected='selected'" : ''}}>Gaza</option>
								<option value="Asia/Hebron" {{$settings_timezone_val=='Asia/Hebron' ? "selected='selected'" : ''}}>Hebron</option>
								<option value="Asia/Ho_Chi_Minh" {{$settings_timezone_val=='Asia/Ho_Chi_Minh' ? "selected='selected'" : ''}}>Ho Chi Minh</option>
								<option value="Asia/Hong_Kong" {{$settings_timezone_val=='Asia/Hong_Kong' ? "selected='selected'" : ''}}>Hong Kong</option>
								<option value="Asia/Hovd" {{$settings_timezone_val=='Asia/Hovd' ? "selected='selected'" : ''}}>Hovd</option>
								<option value="Asia/Irkutsk" {{$settings_timezone_val=='Asia/Irkutsk' ? "selected='selected'" : ''}}>Irkutsk</option>
								<option value="Asia/Jakarta" {{$settings_timezone_val=='Asia/Jakarta' ? "selected='selected'" : ''}}>Jakarta</option>
								<option value="Asia/Jayapura" {{$settings_timezone_val=='Asia/Jayapura' ? "selected='selected'" : ''}}>Jayapura</option>
								<option value="Asia/Jerusalem" {{$settings_timezone_val=='Asia/Jerusalem' ? "selected='selected'" : ''}}>Jerusalem</option>
								<option value="Asia/Kabul" {{$settings_timezone_val=='Asia/Kabul' ? "selected='selected'" : ''}}>Kabul</option>
								<option value="Asia/Kamchatka" {{$settings_timezone_val=='Asia/Kamchatka' ? "selected='selected'" : ''}}>Kamchatka</option>
								<option value="Asia/Karachi" {{$settings_timezone_val=='Asia/Karachi' ? "selected='selected'" : ''}}>Karachi</option>
								<option value="Asia/Kathmandu" {{$settings_timezone_val=='Asia/Kathmandu' ? "selected='selected'" : ''}}>Kathmandu</option>
								<option value="Asia/Khandyga" {{$settings_timezone_val=='Asia/Khandyga' ? "selected='selected'" : ''}}>Khandyga</option>
								<option value="Asia/Kolkata" {{$settings_timezone_val=='Asia/Kolkata' ? "selected='selected'" : ''}}>Kolkata</option>
								<option value="Asia/Krasnoyarsk" {{$settings_timezone_val=='Asia/Krasnoyarsk' ? "selected='selected'" : ''}}>Krasnoyarsk</option>
								<option value="Asia/Kuala_Lumpur" {{$settings_timezone_val=='Asia/Kuala_Lumpur' ? "selected='selected'" : ''}}>Kuala Lumpur</option>
								<option value="Asia/Kuching" {{$settings_timezone_val=='Asia/Kuching' ? "selected='selected'" : ''}}>Kuching</option>
								<option value="Asia/Kuwait" {{$settings_timezone_val=='Asia/Kuwait' ? "selected='selected'" : ''}}>Kuwait</option>
								<option value="Asia/Macau" {{$settings_timezone_val=='Asia/Macau' ? "selected='selected'" : ''}}>Macau</option>
								<option value="Asia/Magadan" {{$settings_timezone_val=='Asia/Magadan' ? "selected='selected'" : ''}}>Magadan</option>
								<option value="Asia/Makassar" {{$settings_timezone_val=='Asia/Makassar' ? "selected='selected'" : ''}}>Makassar</option>
								<option value="Asia/Manila" {{$settings_timezone_val=='Asia/Manila' ? "selected='selected'" : ''}}>Manila</option>
								<option value="Asia/Muscat" {{$settings_timezone_val=='Asia/Muscat' ? "selected='selected'" : ''}}>Muscat</option>
								<option value="Asia/Nicosia" {{$settings_timezone_val=='Asia/Nicosia' ? "selected='selected'" : ''}}>Nicosia</option>
								<option value="Asia/Novokuznetsk" {{$settings_timezone_val=='Asia/Novokuznetsk' ? "selected='selected'" : ''}}>Novokuznetsk</option>
								<option value="Asia/Novosibirsk" {{$settings_timezone_val=='Asia/Novosibirsk' ? "selected='selected'" : ''}}>Novosibirsk</option>
								<option value="Asia/Omsk" {{$settings_timezone_val=='Asia/Omsk' ? "selected='selected'" : ''}}>Omsk</option>
								<option value="Asia/Oral" {{$settings_timezone_val=='Asia/Oral' ? "selected='selected'" : ''}}>Oral</option>
								<option value="Asia/Phnom_Penh" {{$settings_timezone_val=='Asia/Phnom_Penh' ? "selected='selected'" : ''}}>Phnom Penh</option>
								<option value="Asia/Pontianak" {{$settings_timezone_val=='Asia/Pontianak' ? "selected='selected'" : ''}}>Pontianak</option>
								<option value="Asia/Pyongyang" {{$settings_timezone_val=='Asia/Pyongyang' ? "selected='selected'" : ''}}>Pyongyang</option>
								<option value="Asia/Qatar" {{$settings_timezone_val=='Asia/Qatar' ? "selected='selected'" : ''}}>Qatar</option>
								<option value="Asia/Qostanay" {{$settings_timezone_val=='Asia/Qostanay' ? "selected='selected'" : ''}}>Qostanay</option>
								<option value="Asia/Qyzylorda" {{$settings_timezone_val=='Asia/Qyzylorda' ? "selected='selected'" : ''}}>Qyzylorda</option>
								<option value="Asia/Riyadh" {{$settings_timezone_val=='Asia/Riyadh' ? "selected='selected'" : ''}}>Riyadh</option>
								<option value="Asia/Sakhalin" {{$settings_timezone_val=='Asia/Sakhalin' ? "selected='selected'" : ''}}>Sakhalin</option>
								<option value="Asia/Samarkand" {{$settings_timezone_val=='Asia/Samarkand' ? "selected='selected'" : ''}}>Samarkand</option>
								<option value="Asia/Seoul" {{$settings_timezone_val=='Asia/Seoul' ? "selected='selected'" : ''}}>Seoul</option>
								<option value="Asia/Shanghai" {{$settings_timezone_val=='Asia/Shanghai' ? "selected='selected'" : ''}}>Shanghai</option>
								<option value="Asia/Singapore" {{$settings_timezone_val=='Asia/Singapore' ? "selected='selected'" : ''}}>Singapore</option>
								<option value="Asia/Srednekolymsk" {{$settings_timezone_val=='Asia/Srednekolymsk' ? "selected='selected'" : ''}}>Srednekolymsk</option>
								<option value="Asia/Taipei" {{$settings_timezone_val=='Asia/Taipei' ? "selected='selected'" : ''}}>Taipei</option>
								<option value="Asia/Tashkent" {{$settings_timezone_val=='Asia/Tashkent' ? "selected='selected'" : ''}}>Tashkent</option>
								<option value="Asia/Tbilisi" {{$settings_timezone_val=='Asia/Tbilisi' ? "selected='selected'" : ''}}>Tbilisi</option>
								<option value="Asia/Tehran" {{$settings_timezone_val=='Asia/Tehran' ? "selected='selected'" : ''}}>Tehran</option>
								<option value="Asia/Thimphu" {{$settings_timezone_val=='Asia/Thimphu' ? "selected='selected'" : ''}}>Thimphu</option>
								<option value="Asia/Tokyo" {{$settings_timezone_val=='Asia/Tokyo' ? "selected='selected'" : ''}}>Tokyo</option>
								<option value="Asia/Tomsk" {{$settings_timezone_val=='Asia/Tomsk' ? "selected='selected'" : ''}}>Tomsk</option>
								<option value="Asia/Ulaanbaatar" {{$settings_timezone_val=='Asia/Ulaanbaatar' ? "selected='selected'" : ''}}>Ulaanbaatar</option>
								<option value="Asia/Urumqi" {{$settings_timezone_val=='Asia/Urumqi' ? "selected='selected'" : ''}}>Urumqi</option>
								<option value="Asia/Ust-Nera" {{$settings_timezone_val=='Asia/Ust-Nera' ? "selected='selected'" : ''}}>Ust-Nera</option>
								<option value="Asia/Vientiane" {{$settings_timezone_val=='Asia/Vientiane' ? "selected='selected'" : ''}}>Vientiane</option>
								<option value="Asia/Vladivostok" {{$settings_timezone_val=='Asia/Vladivostok' ? "selected='selected'" : ''}}>Vladivostok</option>
								<option value="Asia/Yakutsk" {{$settings_timezone_val=='Asia/Yakutsk' ? "selected='selected'" : ''}}>Yakutsk</option>
								<option value="Asia/Yangon" {{$settings_timezone_val=='Asia/Yangon' ? "selected='selected'" : ''}}>Yangon</option>
								<option value="Asia/Yekaterinburg" {{$settings_timezone_val=='Asia/Yekaterinburg' ? "selected='selected'" : ''}}>Yekaterinburg</option>
								<option value="Asia/Yerevan" {{$settings_timezone_val=='Asia/Yerevan' ? "selected='selected'" : ''}}>Yerevan</option>
								</optgroup>
								<optgroup label="Atlantic">
								<option value="Atlantic/Azores" {{$settings_timezone_val=='Atlantic/Azores' ? "selected='selected'" : ''}}>Azores</option>
								<option value="Atlantic/Bermuda" {{$settings_timezone_val=='Atlantic/Bermuda' ? "selected='selected'" : ''}}>Bermuda</option>
								<option value="Atlantic/Canary" {{$settings_timezone_val=='Atlantic/Canary' ? "selected='selected'" : ''}}>Canary</option>
								<option value="Atlantic/Cape_Verde" {{$settings_timezone_val=='Atlantic/Cape_Verde' ? "selected='selected'" : ''}}>Cape Verde</option>
								<option value="Atlantic/Faroe" {{$settings_timezone_val=='Atlantic/Faroe' ? "selected='selected'" : ''}}>Faroe</option>
								<option value="Atlantic/Madeira" {{$settings_timezone_val=='Atlantic/Madeira' ? "selected='selected'" : ''}}>Madeira</option>
								<option value="Atlantic/Reykjavik" {{$settings_timezone_val=='Atlantic/Reykjavik' ? "selected='selected'" : ''}}>Reykjavik</option>
								<option value="Atlantic/South_Georgia" {{$settings_timezone_val=='Atlantic/South_Georgia' ? "selected='selected'" : ''}}>South Georgia</option>
								<option value="Atlantic/Stanley" {{$settings_timezone_val=='Atlantic/Stanley' ? "selected='selected'" : ''}}>Stanley</option>
								<option value="Atlantic/St_Helena" {{$settings_timezone_val=='Atlantic/St_Helena' ? "selected='selected'" : ''}}>St Helena</option>
								</optgroup>
								<optgroup label="Australia">
								<option value="Australia/Adelaide" {{$settings_timezone_val=='Australia/Adelaide' ? "selected='selected'" : ''}}>Adelaide</option>
								<option value="Australia/Brisbane" {{$settings_timezone_val=='Australia/Brisbane' ? "selected='selected'" : ''}}>Brisbane</option>
								<option value="Australia/Broken_Hill" {{$settings_timezone_val=='Australia/Broken_Hill' ? "selected='selected'" : ''}}>Broken Hill</option>
								<option value="Australia/Currie" {{$settings_timezone_val=='Australia/Currie' ? "selected='selected'" : ''}}>Currie</option>
								<option value="Australia/Darwin" {{$settings_timezone_val=='Australia/Darwin' ? "selected='selected'" : ''}}>Darwin</option>
								<option value="Australia/Eucla" {{$settings_timezone_val=='Australia/Eucla' ? "selected='selected'" : ''}}>Eucla</option>
								<option value="Australia/Hobart" {{$settings_timezone_val=='Australia/Hobart' ? "selected='selected'" : ''}}>Hobart</option>
								<option value="Australia/Lindeman" {{$settings_timezone_val=='Australia/Lindeman' ? "selected='selected'" : ''}}>Lindeman</option>
								<option value="Australia/Lord_Howe" {{$settings_timezone_val=='Australia/Lord_Howe' ? "selected='selected'" : ''}}>Lord Howe</option>
								<option value="Australia/Melbourne" {{$settings_timezone_val=='Australia/Melbourne' ? "selected='selected'" : ''}}>Melbourne</option>
								<option value="Australia/Perth" {{$settings_timezone_val=='Australia/Perth' ? "selected='selected'" : ''}}>Perth</option>
								<option value="Australia/Sydney" {{$settings_timezone_val=='Australia/Sydney' ? "selected='selected'" : ''}}>Sydney</option>
								</optgroup>
								<optgroup label="Europe">
								<option value="Europe/Amsterdam" {{$settings_timezone_val=='Europe/Amsterdam' ? "selected='selected'" : ''}}>Amsterdam</option>
								<option value="Europe/Andorra" {{$settings_timezone_val=='Europe/Andorra' ? "selected='selected'" : ''}}>Andorra</option>
								<option value="Europe/Astrakhan" {{$settings_timezone_val=='Europe/Astrakhan' ? "selected='selected'" : ''}}>Astrakhan</option>
								<option value="Europe/Athens" {{$settings_timezone_val=='Europe/Athens' ? "selected='selected'" : ''}}>Athens</option>
								<option value="Europe/Belgrade" {{$settings_timezone_val=='Europe/Belgrade' ? "selected='selected'" : ''}}>Belgrade</option>
								<option value="Europe/Berlin" {{$settings_timezone_val=='Europe/Berlin' ? "selected='selected'" : ''}}>Berlin</option>
								<option value="Europe/Bratislava" {{$settings_timezone_val=='Europe/Bratislava' ? "selected='selected'" : ''}}>Bratislava</option>
								<option value="Europe/Brussels" {{$settings_timezone_val=='Europe/Brussels' ? "selected='selected'" : ''}}>Brussels</option>
								<option value="Europe/Bucharest" {{$settings_timezone_val=='Europe/Bucharest' ? "selected='selected'" : ''}}>Bucharest</option>
								<option value="Europe/Budapest" {{$settings_timezone_val=='Europe/Budapest' ? "selected='selected'" : ''}}>Budapest</option>
								<option value="Europe/Busingen" {{$settings_timezone_val=='Europe/Busingen' ? "selected='selected'" : ''}}>Busingen</option>
								<option value="Europe/Chisinau" {{$settings_timezone_val=='Europe/Chisinau' ? "selected='selected'" : ''}}>Chisinau</option>
								<option value="Europe/Copenhagen" {{$settings_timezone_val=='Europe/Copenhagen' ? "selected='selected'" : ''}}>Copenhagen</option>
								<option value="Europe/Dublin" {{$settings_timezone_val=='Europe/Dublin' ? "selected='selected'" : ''}}>Dublin</option>
								<option value="Europe/Gibraltar" {{$settings_timezone_val=='Europe/Gibraltar' ? "selected='selected'" : ''}}>Gibraltar</option>
								<option value="Europe/Guernsey" {{$settings_timezone_val=='Europe/Guernsey' ? "selected='selected'" : ''}}>Guernsey</option>
								<option value="Europe/Helsinki" {{$settings_timezone_val=='Europe/Helsinki' ? "selected='selected'" : ''}}>Helsinki</option>
								<option value="Europe/Isle_of_Man" {{$settings_timezone_val=='Europe/Isle_of_Man' ? "selected='selected'" : ''}}>Isle of Man</option>
								<option value="Europe/Istanbul" {{$settings_timezone_val=='Europe/Istanbul' ? "selected='selected'" : ''}}>Istanbul</option>
								<option value="Europe/Jersey" {{$settings_timezone_val=='Europe/Jersey' ? "selected='selected'" : ''}}>Jersey</option>
								<option value="Europe/Kaliningrad" {{$settings_timezone_val=='Europe/Kaliningrad' ? "selected='selected'" : ''}}>Kaliningrad</option>
								<option value="Europe/Kiev" {{$settings_timezone_val=='Europe/Kiev' ? "selected='selected'" : ''}}>Kiev</option>
								<option value="Europe/Kirov" {{$settings_timezone_val=='Europe/Kirov' ? "selected='selected'" : ''}}>Kirov</option>
								<option value="Europe/Lisbon" {{$settings_timezone_val=='Europe/Lisbon' ? "selected='selected'" : ''}}>Lisbon</option>
								<option value="Europe/Ljubljana" {{$settings_timezone_val=='Europe/Ljubljana' ? "selected='selected'" : ''}}>Ljubljana</option>
								<option value="Europe/London" {{$settings_timezone_val=='Europe/London' ? "selected='selected'" : ''}}>London</option>
								<option value="Europe/Luxembourg" {{$settings_timezone_val=='Europe/Luxembourg' ? "selected='selected'" : ''}}>Luxembourg</option>
								<option value="Europe/Madrid" {{$settings_timezone_val=='Europe/Madrid' ? "selected='selected'" : ''}}>Madrid</option>
								<option value="Europe/Malta" {{$settings_timezone_val=='Europe/Malta' ? "selected='selected'" : ''}}>Malta</option>
								<option value="Europe/Mariehamn" {{$settings_timezone_val=='Europe/Mariehamn' ? "selected='selected'" : ''}}>Mariehamn</option>
								<option value="Europe/Minsk" {{$settings_timezone_val=='Europe/Minsk' ? "selected='selected'" : ''}}>Minsk</option>
								<option value="Europe/Monaco" {{$settings_timezone_val=='Europe/Monaco' ? "selected='selected'" : ''}}>Monaco</option>
								<option value="Europe/Moscow" {{$settings_timezone_val=='Europe/Moscow' ? "selected='selected'" : ''}}>Moscow</option>
								<option value="Europe/Oslo" {{$settings_timezone_val=='Europe/Oslo' ? "selected='selected'" : ''}}>Oslo</option>
								<option value="Europe/Paris" {{$settings_timezone_val=='Europe/Paris' ? "selected='selected'" : ''}}>Paris</option>
								<option value="Europe/Podgorica" {{$settings_timezone_val=='Europe/Podgorica' ? "selected='selected'" : ''}}>Podgorica</option>
								<option value="Europe/Prague" {{$settings_timezone_val=='Europe/Prague' ? "selected='selected'" : ''}}>Prague</option>
								<option value="Europe/Riga" {{$settings_timezone_val=='Europe/Riga' ? "selected='selected'" : ''}}>Riga</option>
								<option value="Europe/Rome" {{$settings_timezone_val=='Europe/Rome' ? "selected='selected'" : ''}}>Rome</option>
								<option value="Europe/Samara" {{$settings_timezone_val=='Europe/Samara' ? "selected='selected'" : ''}}>Samara</option>
								<option value="Europe/San_Marino" {{$settings_timezone_val=='Europe/San_Marino' ? "selected='selected'" : ''}}>San Marino</option>
								<option value="Europe/Sarajevo" {{$settings_timezone_val=='Europe/Sarajevo' ? "selected='selected'" : ''}}>Sarajevo</option>
								<option value="Europe/Saratov" {{$settings_timezone_val=='Europe/Saratov' ? "selected='selected'" : ''}}>Saratov</option>
								<option value="Europe/Simferopol" {{$settings_timezone_val=='Europe/Simferopol' ? "selected='selected'" : ''}}>Simferopol</option>
								<option value="Europe/Skopje" {{$settings_timezone_val=='Europe/Skopje' ? "selected='selected'" : ''}}>Skopje</option>
								<option value="Europe/Sofia" {{$settings_timezone_val=='Europe/Sofia' ? "selected='selected'" : ''}}>Sofia</option>
								<option value="Europe/Stockholm" {{$settings_timezone_val=='Europe/Stockholm' ? "selected='selected'" : ''}}>Stockholm</option>
								<option value="Europe/Tallinn" {{$settings_timezone_val=='Europe/Tallinn' ? "selected='selected'" : ''}}>Tallinn</option>
								<option value="Europe/Tirane" {{$settings_timezone_val=='Europe/Tirane' ? "selected='selected'" : ''}}>Tirane</option>
								<option value="Europe/Ulyanovsk" {{$settings_timezone_val=='Europe/Ulyanovsk' ? "selected='selected'" : ''}}>Ulyanovsk</option>
								<option value="Europe/Uzhgorod" {{$settings_timezone_val=='Europe/Uzhgorod' ? "selected='selected'" : ''}}>Uzhgorod</option>
								<option value="Europe/Vaduz" {{$settings_timezone_val=='Europe/Vaduz' ? "selected='selected'" : ''}}>Vaduz</option>
								<option value="Europe/Vatican" {{$settings_timezone_val=='Europe/Vatican' ? "selected='selected'" : ''}}>Vatican</option>
								<option value="Europe/Vienna" {{$settings_timezone_val=='Europe/Vienna' ? "selected='selected'" : ''}}>Vienna</option>
								<option value="Europe/Vilnius" {{$settings_timezone_val=='Europe/Amsterdam' ? "selected='selected'" : ''}}>Vilnius</option>
								<option value="Europe/Volgograd" {{$settings_timezone_val=='Europe/Volgograd' ? "selected='selected'" : ''}}>Volgograd</option>
								<option value="Europe/Warsaw" {{$settings_timezone_val=='Europe/Warsaw' ? "selected='selected'" : ''}}>Warsaw</option>
								<option value="Europe/Zagreb" {{$settings_timezone_val=='Europe/Zagreb' ? "selected='selected'" : ''}}>Zagreb</option>
								<option value="Europe/Zaporozhye" {{$settings_timezone_val=='Europe/Zaporozhye' ? "selected='selected'" : ''}}>Zaporozhye</option>
								<option value="Europe/Zurich" {{$settings_timezone_val=='Europe/Zurich' ? "selected='selected'" : ''}}>Zurich</option>
								</optgroup>
								<optgroup label="Indian">
								<option value="Indian/Antananarivo" {{$settings_timezone_val=='Indian/Antananarivo' ? "selected='selected'" : ''}}>Antananarivo</option>
								<option value="Indian/Chagos" {{$settings_timezone_val=='Indian/Chagos' ? "selected='selected'" : ''}}>Chagos</option>
								<option value="Indian/Christmas" {{$settings_timezone_val=='Indian/Christmas' ? "selected='selected'" : ''}}>Christmas</option>
								<option value="Indian/Cocos" {{$settings_timezone_val=='Indian/Cocos' ? "selected='selected'" : ''}}>Cocos</option>
								<option value="Indian/Comoro" {{$settings_timezone_val=='Indian/Comoro' ? "selected='selected'" : ''}}>Comoro</option>
								<option value="Indian/Kerguelen" {{$settings_timezone_val=='Indian/Kerguelen' ? "selected='selected'" : ''}}>Kerguelen</option>
								<option value="Indian/Mahe" {{$settings_timezone_val=='Indian/Mahe' ? "selected='selected'" : ''}}>Mahe</option>
								<option value="Indian/Maldives" {{$settings_timezone_val=='Indian/Maldives' ? "selected='selected'" : ''}}>Maldives</option>
								<option value="Indian/Mauritius" {{$settings_timezone_val=='Indian/Mauritius' ? "selected='selected'" : ''}}>Mauritius</option>
								<option value="Indian/Mayotte" {{$settings_timezone_val=='Indian/Mayotte' ? "selected='selected'" : ''}}>Mayotte</option>
								<option value="Indian/Reunion" {{$settings_timezone_val=='Indian/Reunion' ? "selected='selected'" : ''}}>Reunion</option>
								</optgroup>
								<optgroup label="Pacific">
								<option value="Pacific/Apia" {{$settings_timezone_val=='Pacific/Apia' ? "selected='selected'" : ''}}>Apia</option>
								<option value="Pacific/Auckland" {{$settings_timezone_val=='Pacific/Auckland' ? "selected='selected'" : ''}}>Auckland</option>
								<option value="Pacific/Bougainville" {{$settings_timezone_val=='Pacific/Bougainville' ? "selected='selected'" : ''}}>Bougainville</option>
								<option value="Pacific/Chatham" {{$settings_timezone_val=='Pacific/Chatham' ? "selected='selected'" : ''}}>Chatham</option>
								<option value="Pacific/Chuuk" {{$settings_timezone_val=='Pacific/Chuuk' ? "selected='selected'" : ''}}>Chuuk</option>
								<option value="Pacific/Easter" {{$settings_timezone_val=='Pacific/Easter' ? "selected='selected'" : ''}}>Easter</option>
								<option value="Pacific/Efate" {{$settings_timezone_val=='Pacific/Efate' ? "selected='selected'" : ''}}>Efate</option>
								<option value="Pacific/Enderbury" {{$settings_timezone_val=='Pacific/Enderbury' ? "selected='selected'" : ''}}>Enderbury</option>
								<option value="Pacific/Fakaofo" {{$settings_timezone_val=='Pacific/Fakaofo' ? "selected='selected'" : ''}}>Fakaofo</option>
								<option value="Pacific/Fiji" {{$settings_timezone_val=='Pacific/Fiji' ? "selected='selected'" : ''}}>Fiji</option>
								<option value="Pacific/Funafuti" {{$settings_timezone_val=='Pacific/Funafuti' ? "selected='selected'" : ''}}>Funafuti</option>
								<option value="Pacific/Galapagos" {{$settings_timezone_val=='Pacific/Galapagos' ? "selected='selected'" : ''}}>Galapagos</option>
								<option value="Pacific/Gambier" {{$settings_timezone_val=='Pacific/Gambier' ? "selected='selected'" : ''}}>Gambier</option>
								<option value="Pacific/Guadalcanal" {{$settings_timezone_val=='Pacific/Guadalcanal' ? "selected='selected'" : ''}}>Guadalcanal</option>
								<option value="Pacific/Guam" {{$settings_timezone_val=='Pacific/Guam' ? "selected='selected'" : ''}}>Guam</option>
								<option value="Pacific/Honolulu" {{$settings_timezone_val=='Pacific/Honolulu' ? "selected='selected'" : ''}}>Honolulu</option>
								<option value="Pacific/Kiritimati" {{$settings_timezone_val=='Pacific/Kiritimati' ? "selected='selected'" : ''}}>Kiritimati</option>
								<option value="Pacific/Kosrae" {{$settings_timezone_val=='Pacific/Kosrae' ? "selected='selected'" : ''}}>Kosrae</option>
								<option value="Pacific/Kwajalein" {{$settings_timezone_val=='Pacific/Kwajalein' ? "selected='selected'" : ''}}>Kwajalein</option>
								<option value="Pacific/Majuro" {{$settings_timezone_val=='Pacific/Majuro' ? "selected='selected'" : ''}}>Majuro</option>
								<option value="Pacific/Marquesas" {{$settings_timezone_val=='Pacific/Marquesas' ? "selected='selected'" : ''}}>Marquesas</option>
								<option value="Pacific/Midway" {{$settings_timezone_val=='Pacific/Midway' ? "selected='selected'" : ''}}>Midway</option>
								<option value="Pacific/Nauru" {{$settings_timezone_val=='Pacific/Nauru' ? "selected='selected'" : ''}}>Nauru</option>
								<option value="Pacific/Niue" {{$settings_timezone_val=='Pacific/Niue' ? "selected='selected'" : ''}}>Niue</option>
								<option value="Pacific/Norfolk" {{$settings_timezone_val=='Pacific/Norfolk' ? "selected='selected'" : ''}}>Norfolk</option>
								<option value="Pacific/Noumea" {{$settings_timezone_val=='Pacific/Noumea' ? "selected='selected'" : ''}}>Noumea</option>
								<option value="Pacific/Pago_Pago" {{$settings_timezone_val=='Pacific/Pago_Pago' ? "selected='selected'" : ''}}>Pago Pago</option>
								<option value="Pacific/Palau" {{$settings_timezone_val=='Pacific/Palau' ? "selected='selected'" : ''}}>Palau</option>
								<option value="Pacific/Pitcairn" {{$settings_timezone_val=='Pacific/Pitcairn' ? "selected='selected'" : ''}}>Pitcairn</option>
								<option value="Pacific/Pohnpei" {{$settings_timezone_val=='Pacific/Pohnpei' ? "selected='selected'" : ''}}>Pohnpei</option>
								<option value="Pacific/Port_Moresby" {{$settings_timezone_val=='Pacific/Port_Moresby' ? "selected='selected'" : ''}}>Port Moresby</option>
								<option value="Pacific/Rarotonga" {{$settings_timezone_val=='Pacific/Rarotonga' ? "selected='selected'" : ''}}>Rarotonga</option>
								<option value="Pacific/Saipan" {{$settings_timezone_val=='Pacific/Saipan' ? "selected='selected'" : ''}}>Saipan</option>
								<option value="Pacific/Tahiti" {{$settings_timezone_val=='Pacific/Tahiti' ? "selected='selected'" : ''}}>Tahiti</option>
								<option value="Pacific/Tarawa" {{$settings_timezone_val=='Pacific/Tarawa' ? "selected='selected'" : ''}}>Tarawa</option>
								<option value="Pacific/Tongatapu" {{$settings_timezone_val=='Pacific/Tongatapu' ? "selected='selected'" : ''}}>Tongatapu</option>
								<option value="Pacific/Wake" {{$settings_timezone_val=='Pacific/Wake' ? "selected='selected'" : ''}}>Wake</option>
								<option value="Pacific/Wallis" {{$settings_timezone_val=='Pacific/Wallis' ? "selected='selected'" : ''}}>Wallis</option>
								</optgroup>
								<optgroup label="UTC">
								<option value="UTC">UTC</option>
								</optgroup>
								<optgroup label="Manual Offsets">
								<option value="UTC-12" {{$settings_timezone_val=='UTC-12' ? "selected='selected'" : ''}}>UTC-12</option>
								<option value="UTC-11.5" {{$settings_timezone_val=='UTC-11.5' ? "selected='selected'" : ''}}>UTC-11:30</option>
								<option value="UTC-11" {{$settings_timezone_val=='UTC-11' ? "selected='selected'" : ''}}>UTC-11</option>
								<option value="UTC-10.5" {{$settings_timezone_val=='UTC-10.5' ? "selected='selected'" : ''}}>UTC-10:30</option>
								<option value="UTC-10" {{$settings_timezone_val=='UTC-10' ? "selected='selected'" : ''}}>UTC-10</option>
								<option value="UTC-9.5" {{$settings_timezone_val=='UTC-9.5' ? "selected='selected'" : ''}}>UTC-9:30</option>
								<option value="UTC-9" {{$settings_timezone_val=='UTC-9' ? "selected='selected'" : ''}}>UTC-9</option>
								<option value="UTC-8.5" {{$settings_timezone_val=='UTC-8.5' ? "selected='selected'" : ''}}>UTC-8:30</option>
								<option value="UTC-8" {{$settings_timezone_val=='UTC-8' ? "selected='selected'" : ''}}>UTC-8</option>
								<option value="UTC-7.5" {{$settings_timezone_val=='UTC-7.5' ? "selected='selected'" : ''}}>UTC-7:30</option>
								<option value="UTC-7" {{$settings_timezone_val=='UTC-7' ? "selected='selected'" : ''}}>UTC-7</option>
								<option value="UTC-6.5" {{$settings_timezone_val=='UTC-6.5' ? "selected='selected'" : ''}}>UTC-6:30</option>
								<option value="UTC-6" {{$settings_timezone_val=='UTC-6' ? "selected='selected'" : ''}}>UTC-6</option>
								<option value="UTC-5.5" {{$settings_timezone_val=='UTC-5.5' ? "selected='selected'" : ''}}>UTC-5:30</option>
								<option value="UTC-5" {{$settings_timezone_val=='UTC-5' ? "selected='selected'" : ''}}>UTC-5</option>
								<option value="UTC-4.5" {{$settings_timezone_val=='UTC-4.5' ? "selected='selected'" : ''}}>UTC-4:30</option>
								<option value="UTC-4" {{$settings_timezone_val=='UTC-4' ? "selected='selected'" : ''}}>UTC-4</option>
								<option value="UTC-3.5" {{$settings_timezone_val=='UTC-3.5' ? "selected='selected'" : ''}}>UTC-3:30</option>
								<option value="UTC-3" {{$settings_timezone_val=='UTC-3' ? "selected='selected'" : ''}}>UTC-3</option>
								<option value="UTC-2.5" {{$settings_timezone_val=='UTC-2.5' ? "selected='selected'" : ''}}>UTC-2:30</option>
								<option value="UTC-2" {{$settings_timezone_val=='UTC-2' ? "selected='selected'" : ''}}>UTC-2</option>
								<option value="UTC-1.5" {{$settings_timezone_val=='UTC-1.5' ? "selected='selected'" : ''}}>UTC-1:30</option>
								<option value="UTC-1" {{$settings_timezone_val=='UTC-1' ? "selected='selected'" : ''}}>UTC-1</option>
								<option value="UTC-0.5" {{$settings_timezone_val=='UTC-0.5' ? "selected='selected'" : ''}}>UTC-0:30</option>
								<option value="UTC+0" {{$settings_timezone_val=='UTC+0' ? "selected='selected'" : ''}}>UTC+0</option>
								<option value="UTC+0.5" {{$settings_timezone_val=='UTC+0.5' ? "selected='selected'" : ''}}>UTC+0:30</option>
								<option value="UTC+1" {{$settings_timezone_val=='UTC+1' ? "selected='selected'" : ''}}>UTC+1</option>
								<option value="UTC+1.5" {{$settings_timezone_val=='UTC+1.5' ? "selected='selected'" : ''}}>UTC+1:30</option>
								<option value="UTC+2" {{$settings_timezone_val=='UTC+2' ? "selected='selected'" : ''}}>UTC+2</option>
								<option value="UTC+2.5" {{$settings_timezone_val=='UTC+2.5' ? "selected='selected'" : ''}}>UTC+2:30</option>
								<option value="UTC+3" {{$settings_timezone_val=='UTC+3' ? "selected='selected'" : ''}}>UTC+3</option>
								<option value="UTC+3.5" {{$settings_timezone_val=='UTC+3.5' ? "selected='selected'" : ''}}>UTC+3:30</option>
								<option value="UTC+4" {{$settings_timezone_val=='UTC+4' ? "selected='selected'" : ''}}>UTC+4</option>
								<option value="UTC+4.5" {{$settings_timezone_val=='UTC+4.5' ? "selected='selected'" : ''}}>UTC+4:30</option>
								<option value="UTC+5" {{$settings_timezone_val=='UTC+5' ? "selected='selected'" : ''}}>UTC+5</option>
								<option value="UTC+5.5" {{$settings_timezone_val=='UTC+5.5' ? "selected='selected'" : ''}}>UTC+5:30</option>
								<option value="UTC+5.75" {{$settings_timezone_val=='UTC+5.75' ? "selected='selected'" : ''}}>UTC+5:45</option>
								<option value="UTC+6" {{$settings_timezone_val=='UTC+6' ? "selected='selected'" : ''}}>UTC+6</option>
								<option value="UTC+6.5" {{$settings_timezone_val=='UTC+6.5' ? "selected='selected'" : ''}}>UTC+6:30</option>
								<option value="UTC+7" {{$settings_timezone_val=='UTC+7' ? "selected='selected'" : ''}}>UTC+7</option>
								<option value="UTC+7.5" {{$settings_timezone_val=='UTC+7.5' ? "selected='selected'" : ''}}>UTC+7:30</option>
								<option value="UTC+8" {{$settings_timezone_val=='UTC+8' ? "selected='selected'" : ''}}>UTC+8</option>
								<option value="UTC+8.5" {{$settings_timezone_val=='UTC+8.5' ? "selected='selected'" : ''}}>UTC+8:30</option>
								<option value="UTC+8.75" {{$settings_timezone_val=='UTC+8.75' ? "selected='selected'" : ''}}>UTC+8:45</option>
								<option value="UTC+9" {{$settings_timezone_val=='UTC+9' ? "selected='selected'" : ''}}>UTC+9</option>
								<option value="UTC+9.5" {{$settings_timezone_val=='UTC+9.5' ? "selected='selected'" : ''}}>UTC+9:30</option>
								<option value="UTC+10" {{$settings_timezone_val=='UTC+10' ? "selected='selected'" : ''}}>UTC+10</option>
								<option value="UTC+10.5" {{$settings_timezone_val=='UTC+10.5' ? "selected='selected'" : ''}}>UTC+10:30</option>
								<option value="UTC+11" {{$settings_timezone_val=='UTC+11' ? "selected='selected'" : ''}}>UTC+11</option>
								<option value="UTC+11.5" {{$settings_timezone_val=='UTC+11.5' ? "selected='selected'" : ''}}>UTC+11:30</option>
								<option value="UTC+12" {{$settings_timezone_val=='UTC+12' ? "selected='selected'" : ''}}>UTC+12</option>
								<option value="UTC+12.75" {{$settings_timezone_val=='UTC+12.75' ? "selected='selected'" : ''}}>UTC+12:45</option>
								<option value="UTC+13" {{$settings_timezone_val=='UTC+13' ? "selected='selected'" : ''}}>UTC+13</option>
								<option value="UTC+13.75" {{$settings_timezone_val=='UTC+13.75' ? "selected='selected'" : ''}}>UTC+13:45</option>
								<option value="UTC+14" {{$settings_timezone_val=='UTC+14' ? "selected='selected'" : ''}}>UTC+14</option>
								</optgroup>
                            </select>
                                @else
                                <input class="form-control" name="timezone" data-old="" style="width:200px" value="{{ $settings_timezone_val }}" readonly>
                            @endif
						    @error('timezone')
						       <span class="invalid-feedback text-danger" role="alert">
						           <strong>{{ $message }}</strong>
						       </span>
						   @enderror
						</div>
					</div>

					<div class="col-md-1">
						<label for="currency">{{__('messages.currency')}}</label>
					</div>
					<div class="col-md-11">
						<div class="form-group">
                            @if(Auth::user()->type == 1)
							<select name="currency" class="form-control" id="currency" value="" data-old="" style="width:200px">
								<option value="USD" {{$settings_currency_val=='USD' ? "selected='selected'" : ''}}>United States Dollars</option>
								<option value="EUR" {{$settings_currency_val=='EUR' ? "selected='selected'" : ''}}>Euro</option>
								<option value="GBP" {{$settings_currency_val=='GBP' ? "selected='selected'" : ''}}>United Kingdom Pounds</option>
								<option value="DZD" {{$settings_currency_val=='DZD' ? "selected='selected'" : ''}}>Algeria Dinars</option>
								<option value="ARP" {{$settings_currency_val=='ARP' ? "selected='selected'" : ''}}>Argentina Pesos</option>
								<option value="AUD" {{$settings_currency_val=='AUD' ? "selected='selected'" : ''}}>Australia Dollars</option>
								<option value="ATS" {{$settings_currency_val=='ATS' ? "selected='selected'" : ''}}>Austria Schillings</option>
								<option value="BSD" {{$settings_currency_val=='BSD' ? "selected='selected'" : ''}}>Bahamas Dollars</option>
								<option value="BBD" {{$settings_currency_val=='BBD' ? "selected='selected'" : ''}}>Barbados Dollars</option>
								<option value="BEF" {{$settings_currency_val=='BEF' ? "selected='selected'" : ''}}>Belgium Francs</option>
								<option value="BMD" {{$settings_currency_val=='BMD' ? "selected='selected'" : ''}}>Bermuda Dollars</option>
								<option value="BRL" {{$settings_currency_val=='BRL' ? "selected='selected'" : ''}}>Brazil Real</option>
								<option value="BGN" {{$settings_currency_val=='BGN' ? "selected='selected'" : ''}}>Bulgaria Lev</option>
								<option value="CAD" {{$settings_currency_val=='CAD' ? "selected='selected'" : ''}}>Canada Dollars</option>
								<option value="CLP" {{$settings_currency_val=='CLP' ? "selected='selected'" : ''}}>Chile Pesos</option>
								<option value="CNY" {{$settings_currency_val=='CNY' ? "selected='selected'" : ''}}>China Yuan Renmimbi</option>
								<option value="CYP" {{$settings_currency_val=='CYP' ? "selected='selected'" : ''}}>Cyprus Pounds</option>
								<option value="CSK" {{$settings_currency_val=='CSK' ? "selected='selected'" : ''}}>Czech Republic Koruna</option>
								<option value="DKK" {{$settings_currency_val=='DKK' ? "selected='selected'" : ''}}>Denmark Kroner</option>
								<option value="NLG" {{$settings_currency_val=='NLG' ? "selected='selected'" : ''}}>Dutch Guilders</option>
								<option value="XCD" {{$settings_currency_val=='XCD' ? "selected='selected'" : ''}}>Eastern Caribbean Dollars</option>
								<option value="EGP" {{$settings_currency_val=='EGP' ? "selected='selected'" : ''}}>Egypt Pounds</option>
								<option value="FJD" {{$settings_currency_val=='FJD' ? "selected='selected'" : ''}}>Fiji Dollars</option>
								<option value="FIM" {{$settings_currency_val=='FIM' ? "selected='selected'" : ''}}>Finland Markka</option>
								<option value="FRF" {{$settings_currency_val=='FRF' ? "selected='selected'" : ''}}>France Francs</option>
								<option value="DEM" {{$settings_currency_val=='DEM' ? "selected='selected'" : ''}}>Germany Deutsche Marks</option>
								<option value="XAU" {{$settings_currency_val=='XAU' ? "selected='selected'" : ''}}>Gold Ounces</option>
								<option value="GRD" {{$settings_currency_val=='GRD' ? "selected='selected'" : ''}}>Greece Drachmas</option>
								<option value="HKD" {{$settings_currency_val=='HKD' ? "selected='selected'" : ''}}>Hong Kong Dollars</option>
								<option value="HUF" {{$settings_currency_val=='HUF' ? "selected='selected'" : ''}}>Hungary Forint</option>
								<option value="ISK" {{$settings_currency_val=='ISK' ? "selected='selected'" : ''}}>Iceland Krona</option>
								<option value="INR" {{$settings_currency_val=='INR' ? "selected='selected'" : ''}}>India Rupees</option>
								<option value="IDR" {{$settings_currency_val=='IDR' ? "selected='selected'" : ''}}>Indonesia Rupiah</option>
								<option value="IEP" {{$settings_currency_val=='IEP' ? "selected='selected'" : ''}}>Ireland Punt</option>
								<option value="ILS" {{$settings_currency_val=='ILS' ? "selected='selected'" : ''}}>Israel New Shekels</option>
								<option value="ITL" {{$settings_currency_val=='ITL' ? "selected='selected'" : ''}}>Italy Lira</option>
								<option value="JMD" {{$settings_currency_val=='JMD' ? "selected='selected'" : ''}}>Jamaica Dollars</option>
								<option value="JPY" {{$settings_currency_val=='JPY' ? "selected='selected'" : ''}}>Japan Yen</option>
								<option value="JOD" {{$settings_currency_val=='JOD' ? "selected='selected'" : ''}}>Jordan Dinar</option>
								<option value="KRW" {{$settings_currency_val=='KRW' ? "selected='selected'" : ''}}>Korea (South) Won</option>
								<option value="LBP" {{$settings_currency_val=='LBP' ? "selected='selected'" : ''}}>Lebanon Pounds</option>
								<option value="LUF" {{$settings_currency_val=='LUF' ? "selected='selected'" : ''}}>Luxembourg Francs</option>
								<option value="MYR" {{$settings_currency_val=='MYR' ? "selected='selected'" : ''}}>Malaysia Ringgit</option>
								<option value="MXP" {{$settings_currency_val=='MXP' ? "selected='selected'" : ''}}>Mexico Pesos</option>
								<option value="NLG" {{$settings_currency_val=='NLG' ? "selected='selected'" : ''}}>Netherlands Guilders</option>
								<option value="NZD" {{$settings_currency_val=='NZD' ? "selected='selected'" : ''}}>New Zealand Dollars</option>
								<option value="NOK" {{$settings_currency_val=='NOK' ? "selected='selected'" : ''}}>Norway Kroner</option>
								<option value="PKR" {{$settings_currency_val=='PKR' ? "selected='selected'" : ''}}>Pakistan Rupees</option>
								<option value="XPD" {{$settings_currency_val=='XPD' ? "selected='selected'" : ''}}>Palladium Ounces</option>
								<option value="PHP" {{$settings_currency_val=='PHP' ? "selected='selected'" : ''}}>Philippines Pesos</option>
								<option value="XPT" {{$settings_currency_val=='XPT' ? "selected='selected'" : ''}}>Platinum Ounces</option>
								<option value="PLN" {{$settings_currency_val=='PLN' ? "selected='selected'" : ''}}>Poland Zloty</option>
								<option value="PTE" {{$settings_currency_val=='PTE' ? "selected='selected'" : ''}}>Portugal Escudo</option>
								<option value="ROL" {{$settings_currency_val=='ROL' ? "selected='selected'" : ''}}>Romania Leu</option>
								<option value="RUR" {{$settings_currency_val=='RUR' ? "selected='selected'" : ''}}>Russia Rubles</option>
								<option value="SAR" {{$settings_currency_val=='SAR' ? "selected='selected'" : ''}}>Saudi Arabia Riyal</option>
								<option value="XAG" {{$settings_currency_val=='XAG' ? "selected='selected'" : ''}}>Silver Ounces</option>
								<option value="SGD" {{$settings_currency_val=='SGD' ? "selected='selected'" : ''}}>Singapore Dollars</option>
								<option value="SKK" {{$settings_currency_val=='SKK' ? "selected='selected'" : ''}}>Slovakia Koruna</option>
								<option value="ZAR" {{$settings_currency_val=='ZAR' ? "selected='selected'" : ''}}>South Africa Rand</option>
								<option value="KRW" {{$settings_currency_val=='KRW' ? "selected='selected'" : ''}}>South Korea Won</option>
								<option value="ESP" {{$settings_currency_val=='ESP' ? "selected='selected'" : ''}}>Spain Pesetas</option>
								<option value="XDR" {{$settings_currency_val=='XDR' ? "selected='selected'" : ''}}>Special Drawing Right (IMF)</option>
								<option value="SDD" {{$settings_currency_val=='SDD' ? "selected='selected'" : ''}}>Sudan Dinar</option>
								<option value="SEK" {{$settings_currency_val=='SEK' ? "selected='selected'" : ''}}>Sweden Krona</option>
								<option value="CHF" {{$settings_currency_val=='CHF' ? "selected='selected'" : ''}}>Switzerland Francs</option>
								<option value="TWD" {{$settings_currency_val=='TWD' ? "selected='selected'" : ''}}>Taiwan Dollars</option>
								<option value="THB" {{$settings_currency_val=='THB' ? "selected='selected'" : ''}}>Thailand Baht</option>
								<option value="TTD" {{$settings_currency_val=='TTD' ? "selected='selected'" : ''}}>Trinidad and Tobago Dollars</option>
								<option value="TRL" {{$settings_currency_val=='TRL' ? "selected='selected'" : ''}}>Turkey Lira</option>
								<option value="VEB" {{$settings_currency_val=='VEB' ? "selected='selected'" : ''}}>Venezuela Bolivar</option>
								<option value="ZMK" {{$settings_currency_val=='ZMK' ? "selected='selected'" : ''}}>Zambia Kwacha</option>
								<option value="EUR" {{$settings_currency_val=='EUR' ? "selected='selected'" : ''}}>Euro</option>
								<option value="XCD" {{$settings_currency_val=='XCD' ? "selected='selected'" : ''}}>Eastern Caribbean Dollars</option>
								<option value="XDR" {{$settings_currency_val=='XDR' ? "selected='selected'" : ''}}>Special Drawing Right (IMF)</option>
								<option value="XAG" {{$settings_currency_val=='XAG' ? "selected='selected'" : ''}}>Silver Ounces</option>
								<option value="XAU" {{$settings_currency_val=='XAU' ? "selected='selected'" : ''}}>Gold Ounces</option>
								<option value="XPD" {{$settings_currency_val=='XPD' ? "selected='selected'" : ''}}>Palladium Ounces</option>
								<option value="XPT" {{$settings_currency_val=='XPT' ? "selected='selected'" : ''}}>Platinum Ounces</option>
                            </select>
                                @else
                                <input class="form-control" name="currency" data-old="" style="width:200px" value="{{ $settings_currency_val }}" readonly>
                            @endif
						    @error('currency')
						       <span class="invalid-feedback text-danger" role="alert">
						           <strong>{{ $message }}</strong>
						       </span>
						   @enderror
						</div>
                    </div>
                    @if(Auth::user()->type==1)
					<div class="form-group col-md-12">
						    <button type="button" name="submit" class="btn btn-primary submit-settings-frm">{{ __('messages.save_settings') }}</button>
                    </div>
                    @endif
				</form>
			</div>
			<!-- /.box-body -->
			</div>
		<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
@include('layouts.afterlogin.deletemodal')

</div>
@endsection
