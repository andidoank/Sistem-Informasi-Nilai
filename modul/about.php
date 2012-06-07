<?php

/*
 * Program Kerja Praktik
 * andi zainul albaab (andi@kangandi.web.id).
 * twitter 	: @andizab
 * blog		: blog.kangandi.web.id
 * silahkan digunakan dan dimodifikasi untuk pembelajaran 
 */
?>

<h3>Tentang Program</h3>

<p><b>Sistem Informasi Nilai</b> ini didedikasikan untuk <center><h6>SMA N 1 Prambon</h6></center>
sebagai bagian dari pembelajaran yaitu kerja praktik Teknik Informatika di UIN Sunan Kalijaga Yogyakarta</p>
<p><h5>Terima Kasih kepada</h5>
<ul>
	<li>Allah SWT (Tuhanku)</li>
	<li>Drs. Imam Damami (Bapakku)</li>
	<li>Mustanginah (Ibukku)</li>
	<li>Maria Ulfah Siregar (Pembimbingku)</li>
	<li>Drs. Achmad Turmudi (Kepala SMAN 1 Prambon)</li>
	<li>Alfin dan Ayu (Adek2ku)</li>
	<li>Teman-teman TIF Khusus 2008 UIN Suka</li>
	<li>dan seluruh pihak yang terkait</li>
</ul></p>
<p><h6>Regards,</h6>
<strong>Andi Zainul Albaab (08651016)</strong><br/>
<small>twitter: <a href="http://twitter.com/andizab">@andizab</a></small><br/>
<small>email &nbsp;: andi@kangandi.web.id</small><br/>
<small>No. Hape : +62-899-504-9080</small>
</p>

						<form action="#about" method="post">

                            <h4>FeedBack</h4>
                            <small>Tidak ada sistem yang sempurna, karenanya FeedBack dari anda akan sangat berguna untuk perbaikan maupun pengembangan sistem ini.</small>
                            <fieldset>
                                <textarea class="textarea" name="feedback" cols="79" rows="5"></textarea><br/>
                                <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>"/>
                                <input type="text" class="text-input medium-input" name="nama" value="<?php echo $_SESSION['nama'];?>"/>
                                <input class="button" type="submit" value="Send" />

                            </fieldset>

                        </form>

