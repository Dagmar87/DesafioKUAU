import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Turma } from '../models/turma.model';

const baseUrl = 'http://localhost:8080/api/turmas';

@Injectable({
  providedIn: 'root',
})
export class TurmaService {
  constructor(private http: HttpClient) {}

  getAll(): Observable<Turma[]> {
    return this.http.get<Turma[]>(baseUrl);
  }

  get(id: any): Observable<Turma> {
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

  findByNome(nome: any): Observable<Turma[]> {
    return this.http.get<Turma[]>(`${baseUrl}?nome=${nome}`);
  }
}
