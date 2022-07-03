import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Aluno } from '../models/aluno.model';

const baseUrl = 'http://localhost:8080/api/alunos';

@Injectable({
  providedIn: 'root'
})
export class AlunoService {

  constructor(private http: HttpClient) { }

  getAll(): Observable<Aluno[]> {
    return this.http.get<Aluno[]>(baseUrl);
  }

  get(id: any): Observable<Aluno> {
    return this.http.get(`${baseUrl}/${id}`);
  }

  create(data: any): Observable<any> {
    return this.http.post(baseUrl, data);
  }

  update(id: any, data: any): Observable<any> {
    return this.http.put(`${baseUrl}/${id}`, data);
  }

  delete(id: any): Observable<any> {
    return this.http.delete(`${baseUrl}/${id}`);
  }

  findByNome(nome: any): Observable<Aluno[]> {
    return this.http.get<Aluno[]>(`${baseUrl}?nome=${nome}`);
  }

  getByTurma(turmaId: any): Observable<Aluno[]> {
    return this.http.get<Aluno[]>(`${baseUrl}?turmaId=${turmaId}`);
  }
}
