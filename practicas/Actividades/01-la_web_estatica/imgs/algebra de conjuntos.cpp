#include <iostream>
using namespace std;

class Vector{
	private:
	 int  t;
	 int* v;
	 int n;
	
	public:
	 Vector(); 
	 
	 // Getters
	 int  getTam();  
	 int* getDatos();
	 int getN();
	 
	 void setTam(int tam);
	 void setN (int num);
	 
	 void inserta (int dato);
	 void inserta();
	 int getEle(int); 
	 void comparacion_U(); 
	 void comparacion_D(); 
	 void comparacion_C(); 
	 void muestra();
 };
 
Vector::Vector(){
	 t = 0;
	 v = new int[t]; 
	 n = 0;
}
	 
int  Vector::getTam(){ return t; }  
int* Vector::getDatos(){ return v; }
int  Vector::getN(){return n; }

void Vector::setTam(int tam){
	t = tam;
}

void Vector::setN(int num){
	n = num;
}
void Vector::inserta(){
	int dato;
	for (int i = 0; i<t; i++){
		cout << "Dato " << i+1 << ": "; cin >> dato;
		v[i] = dato;
	}
 }
 void Vector::comparacion_D(){
	for(int c=0; c<=t; c++){
		for(int i=0; i<t-1; i++){
	  		for (int j=i+1; j<t; j++){
	  			if(v[i] == v[j]){
	  				if((i==0) && (j==i+1)){
						for(int k=j; k<t; k++){
							v[k] = v[k+1];
						}
						for(int k=i; k<t; k++){
							v[k] = v[k+1];
						}
						n=n-2;
						t=t-2;
					}
					else{
						if((i==0) && (j==t-1)){
							for(int k=i; k<t; k++){
								v[k] = v[k+1];
							}
							n = n-2;
							t=t-2;
						}
						else{
							if((i==t-2) && (j==t-1)){
								n=n-2;
							  	t=t-2;
							}
							else{
								for(int k=j; k<t; k++){
									v[k] = v[k+1];
								}
								for(int k=i; k<t; k++){
									v[k] = v[k+1];
								}
								n=n-2;
							  	t=t-2;
							}
						}
					}
				}	
			}
		}	
	}
}

 
 
 
 void Vector::inserta(int dato){
    v[n] = dato;
    n++;
    t++;
 }
 
 void Vector::comparacion_U(){
  	for(int i=0; i<t-1; i++){
  		for (int j=i+1; j<t; j++){
  			if(v[i] == v[j]){
  				for (int k=j+1; k<t; k++){
  					v[j] = v[k];
				}
		  	n--;
		  	t--;
			}	
		}
  	}
}

void Vector::comparacion_C(){
	for(int i=0; i<t-1; i++){
  		for (int j=i+1; j<t; j++){
  			if(v[i] == v[j]){
  				cout << v[i] << "\t";
			}
		}	
	}
}


 
 void Vector::muestra(){
	for(int i=0; i<t; i++) cout << v[i] << "\t";
 }
 

int menu(){
	int opc;
	
	do{
		cout << "\n\t\t\t programa Algebra de Conjuntos\n";
		cout << "\t 1. Producto\n";
		cout << "\t 2. Union\n";
		cout << "\t 3. Conjuncion\n";
		cout << "\t 4. Diferencia\n";
		cout << "\t 5. Complemento\n";
		cout << "\t 6. Mostrar Conjuntos\n";
		cout << "\t 9. Salir\n";
		cout << "\t\t\t Opcion ... "; cin >> opc;
		if(opc==1 || opc==2 || opc==3|| opc==4 || opc==5 || opc==6 || opc==9) return opc;
		cout << "opcion invalida\n";
	}while(1);
}
 
int main(){
	Vector p1;
	Vector p2;
	Vector p3;
	int opc;
	int dato;
	
	do{
		opc = menu();
		switch(opc){
			case 1: cout << "\nElige el numero de datos para el conjunto A: "; cin >> dato;
				p1.setTam(dato);
				p1.inserta();
				cout << "Elige el numero de datos para el conjunto B: "; cin >> dato;
				p2.setTam(dato);
				p2.inserta();
				cout << "\n PRODUCTO AxB\n";
				for (int i = 0; i < p1.getTam(); i++){
					for (int j = 0; j < p2.getTam(); j++){
					cout << "(" << p1.getDatos()[i] <<"," << p2.getDatos()[j] << ")";	
					}
				}
				cout << "\n\n PRODUCTO BxA\n";
				for (int i = 0; i < p2.getTam(); i++){
					for (int j = 0; j < p1.getTam(); j++){
					cout << "(" << p2.getDatos()[i] <<"," << p1.getDatos()[j] << ")";	
					}
				}
				cout << "\n\n PRODUCTO BxB\n";
				for (int i = 0; i < p2.getTam(); i++){
					for (int j = 0; j < p2.getTam(); j++){
					cout << "(" << p2.getDatos()[i] <<"," << p2.getDatos()[j] << ")";	
					}
				}
				cout << "\n\n PRODUCTO AxA\n";
				for (int i = 0; i < p1.getTam(); i++){
					for (int j = 0; j < p1.getTam(); j++){
					cout << "(" << p1.getDatos()[i] <<"," << p1.getDatos()[j] << ")";	
					}
				}
				cout << endl;
				break;
			case 2: 
				 cout << "\nElige el numero de datos para el conjunto A: "; cin >> dato;
				p1.setTam(dato);
				p1.inserta();
				cout << "Elige el numero de datos para el conjunto B: "; cin >> dato;
				p2.setTam(dato);
				p2.inserta();
				for (int i = 0; i < p1.getTam(); i++){
					p3.inserta(p1.getDatos()[i]);
				}
				for (int i = 0; i < p2.getTam(); i++){
					p3.inserta(p2.getDatos()[i]);
				}
				cout << endl;
				p3.comparacion_U();
				cout << "\n UNION AuB\n";
				p3.muestra();
				cout << endl;
				p3.setTam(0);
				p3.setN(0);
				break;
			case 3: 
				 cout << "\nElige el numero de datos para el conjunto A: "; cin >> dato;
				p1.setTam(dato);
				p1.inserta();
				cout << "Elige el numero de datos para el conjunto B: "; cin >> dato;
				p2.setTam(dato);
				p2.inserta();
				p1.comparacion_U();
				p2.comparacion_U();
				for (int i = 0; i < p1.getTam(); i++){
					p3.inserta(p1.getDatos()[i]);
				}
				for (int i = 0; i < p2.getTam(); i++){
					p3.inserta(p2.getDatos()[i]);
				}
				cout << endl;
				cout << "\n Conjuncion AnB\n";
				p3.comparacion_C();
				cout << endl;
				p3.setTam(0);
				p3.setN(0);
				break;
			case 4:
				cout << "\nElige el numero de datos para el conjunto A: "; cin >> dato;
				p1.setTam(dato);
				p1.inserta();
				cout << "Elige el numero de datos para el conjunto B: "; cin >> dato;
				p2.setTam(dato);
				p2.inserta();
				p1.comparacion_U();
				p2.comparacion_U();
				cout << "\n Diferencia A-B\n";
				for (int i = 0; i < p1.getTam(); i++){
					p3.inserta(p1.getDatos()[i]);
				}
				for(int i=0; i<p1.getTam();i++){
					for(int j=0; j<p2.getTam();j++){
						if(p1.getDatos()[i] == p2.getDatos()[j]){
							p3.inserta(p2.getDatos()[j]);
						}
					}
				}
				p3.comparacion_D();
				p3.muestra();
				cout << endl;
				p3.setTam(0);
				p3.setN(0);
				cout << "\n Diferencia B-A\n";
				for (int i = 0; i < p2.getTam(); i++){
					p3.inserta(p2.getDatos()[i]);
				}
				for(int i=0; i<p2.getTam();i++){
					for(int j=0; j<p1.getTam();j++){
						if(p2.getDatos()[i] == p1.getDatos()[j]){
							p3.inserta(p1.getDatos()[j]);
						}
					}
				}
				p3.comparacion_D();
				p3.muestra();
				cout << endl;
				p3.setTam(0);
				p3.setN(0);
				break;
			case 5:
				cout << "\nElige el numero de datos para el conjunto A: "; cin >> dato;
				p1.setTam(dato);
				p1.inserta();
				cout << "Elige el numero de datos para el conjunto B: "; cin >> dato;
				p2.setTam(dato);
				p2.inserta();
				p1.comparacion_U();
				p2.comparacion_U();
				for (int i = 1; i <= 50; i++){
					p3.inserta(i);
				}
				for (int i = 0; i < p1.getTam(); i++){
					p3.inserta(p1.getDatos()[i]);
				}
				p3.comparacion_D();
				p3.muestra();
				cout << endl;
				p3.setTam(0);
				p3.setN(0);
				for (int i = 1; i <= 50; i++){
					p3.inserta(i);
				}
				for (int i = 0; i < p2.getTam(); i++){
					p3.inserta(p2.getDatos()[i]);
				}
				p3.comparacion_D();
				p3.muestra();
				cout << endl;
				p3.setTam(0);
				p3.setN(0);
				break;
			case 6:
				cout << "datos en A: "; p1.muestra(); cout << endl;
				cout << "datos en B: "; p2.muestra(); cout << endl;
				cout << "datos en C: "; p3.muestra(); cout << endl;
				break;
			case 9: cout << " ... \n"; break;
				
		}
	}while(opc!=9);
 }
