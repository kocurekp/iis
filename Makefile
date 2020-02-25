.PHONY: upload magic zip
	
upload:
	scp -r ./www/ xnacar00@eva.fit.vutbr.cz:~/WWW/IIS


magic:
	git add .
	git commit -m ":|"
	git pull
	scp -r ./www/ xnacar00@eva.fit.vutbr.cz:~/WWW/IIS

zip:
	zip xnacar00.zip -r www/css/ www/fce/ www/images/ www/include/ www/js/ www/lib/ www/obsah/ www/sql/ www/index.php doc.html