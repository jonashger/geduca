package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QTurma is a Querydsl query type for Turma
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QTurma extends EntityPathBase<Turma> {

    private static final long serialVersionUID = -497319443L;

    public static final QTurma turma = new QTurma("turma");

    public final NumberPath<Long> codigoAnoLetivo = createNumber("codigoAnoLetivo", Long.class);

    public final NumberPath<Long> codigoSerie = createNumber("codigoSerie", Long.class);

    public final NumberPath<Long> codigoTurno = createNumber("codigoTurno", Long.class);

    public final DateTimePath<java.util.Date> dataCadastro = createDateTime("dataCadastro", java.util.Date.class);

    public final DateTimePath<java.util.Date> dataManutencao = createDateTime("dataManutencao", java.util.Date.class);

    public final StringPath descricao = createString("descricao");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public QTurma(String variable) {
        super(Turma.class, forVariable(variable));
    }

    public QTurma(Path<? extends Turma> path) {
        super(path.getType(), path.getMetadata());
    }

    public QTurma(PathMetadata<?> metadata) {
        super(Turma.class, metadata);
    }

}

