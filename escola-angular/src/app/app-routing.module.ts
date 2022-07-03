import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AddAlunoComponent } from './components/add-aluno/add-aluno.component';
import { AddTurmaComponent } from './components/add-turma/add-turma.component';
import { AlunoDetailsComponent } from './components/aluno-details/aluno-details.component';
import { AlunosListComponent } from './components/alunos-list/alunos-list.component';
import { TurmaDetailsComponent } from './components/turma-details/turma-details.component';
import { TurmasListComponent } from './components/turmas-list/turmas-list.component';

const routes: Routes = [
  { path: '', redirectTo: 'escola/turmas', pathMatch: 'full' },
  { path: 'escola/turmas', component: TurmasListComponent },
  { path: 'escola/turmas/:id', component: TurmaDetailsComponent },
  { path: 'escola/addTurma', component: AddTurmaComponent },
  { path: 'escola/turmas/:id/alunos', component: AlunosListComponent },
  { path: 'alunos/:id', component: AlunoDetailsComponent },
  { path: 'escola/turmas/:id/addAlunos', component: AddAlunoComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
