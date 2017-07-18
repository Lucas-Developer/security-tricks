#include <stdio.h>
#include <curl/curl.h>
#include <stdlib.h>
#include <string.h>


/*
Compile: gcc -lcurl foo.c -o foo
./foo http://site.com.br | grep "http" | awk -F '"' '{print $2}'
*/

static size_t writeData(void *ptr, size_t size, size_t nmemb, void *stream){
	size_t written = fwrite(ptr, size, nmemb, (FILE *)stream);
	return written;
}


void parser(FILE *header,char *nomearq, FILE *body, char *nomearq2){
	header = fopen(nomearq, "r");
	body = fopen(nomearq2, "r");
	char buffer[1026];
	char *copia[1026];
	int i = 0, k = 0;
	char *pattern_js = "<script src=";
	char *pattern_href = "href=";
	char *pattern_XForward = "X-Forwarded-For";
	/*if(header == NULL){
		printf("Erro ao ler o arquivo header\n");
		exit(1);
	}*/
	if(body == NULL){
		printf("Erro ao abrir o arquivo da source\n");
		exit(1);
	}
	printf("JavaScript Lines\n");
	char *string[100];
	int y = 0;
	while(fgets(buffer, 1025,body) != NULL){
		if(strstr(buffer, pattern_js) != NULL){
			puts(buffer);
		}
	}
	printf("__________________\n");
	fclose(body);
	//fclose(header);
	
	body = fopen(nomearq2, "r");
	printf("Links\n");
	while(fgets(buffer, 1025,body) != NULL){
		if(strstr(buffer, pattern_href) != NULL){
			puts(buffer);
		}
	}
	printf("__________________\n");
	fclose(body);
	while(fgets(buffer, 1025, header) != NULL){
		if(strstr(buffer, pattern_XForward) != NULL){
			printf("Possivel XSS via X-Forwardes-For\n");
			puts(buffer);
		}
	}
	
	fclose(header);

	/*
	while((fscanf(body, "%s", linha_vet[i])) != EOF)
		i++;
	
	for(k=0;k<i;k++){
		if(strstr(linha_vet[k],pattern) != NULL){
		printf("%s\n",linha_vet[k]);
	}*/
}

int open(char *url){
	CURL *curl = curl_easy_init();
	FILE *headerfile;
	FILE *sourcefile;
	static const char *nomeHeader = "header.out";
	static const char *nomeSource = "body.out";

	curl_easy_setopt(curl, CURLOPT_URL, url);
	curl_easy_setopt(curl, CURLOPT_NOPROGRESS, 1L);
	curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, writeData);

	headerfile = fopen(nomeHeader, "wb");
	if(!headerfile){
		curl_easy_cleanup(curl);
		return -1;
	}

	sourcefile = fopen(nomeSource, "wb");

	if(!sourcefile){
		curl_easy_cleanup(curl);
		return -1;
	}

	curl_easy_setopt(curl, CURLOPT_HEADERDATA, headerfile);
	curl_easy_setopt(curl, CURLOPT_WRITEDATA, sourcefile);
	curl_easy_perform(curl);
	
	fclose(headerfile);
	fclose(sourcefile);

	parser(headerfile, nomeHeader, sourcefile, nomeSource);
	
	//fclose(headerfile);
	//fclose(sourcefile;);

	system("rm -rf header,out && rm -rf body.out");
	curl_easy_cleanup(curl);
}


int main(int argc, char *argv[]){
	if(argc < 2){
		printf("./foo <url>\n");
		exit(0);
	}else{
		open(argv[1]);
	}
}
