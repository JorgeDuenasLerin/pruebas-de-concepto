#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <errno.h>
#include <sys/wait.h>
#include <string.h>

int main(int argc, char* argv[]){
  pid_t p1;
  char* params[] = {"ls", (char*) NULL};
  int err;

  p1 = fork();
  if(p1==0){
    err = execv("/bin/ls", params);
    if(err){
      fprintf(stderr, "Error opening file: %s\n", strerror( err ));
    }
    printf("Hijo!\n");
  }else{
    sleep(1);
    printf("Padre!\n");
    wait(&p1);
    printf("Acabdo hijo!\n");
  }
  exit(0);
}
