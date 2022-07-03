import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AddTurmaComponent } from './components/add-turma/add-turma.component';
import { TurmaDetailsComponent } from './components/turma-details/turma-details.component';
import { TurmasListComponent } from './components/turmas-list/turmas-list.component';
import { AddAlunoComponent } from './components/add-aluno/add-aluno.component';
import { AlunoDetailsComponent } from './components/aluno-details/aluno-details.component';
import { AlunosListComponent } from './components/alunos-list/alunos-list.component';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

@NgModule({
  declarations: [
    AppComponent,
    AddTurmaComponent,
    TurmaDetailsComponent,
    TurmasListComponent,
    AddAlunoComponent,
    AlunoDetailsComponent,
    AlunosListComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
