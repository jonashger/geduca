package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QMatricula is a Querydsl query type for Matricula
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QMatricula extends EntityPathBase<Matricula> {

    private static final long serialVersionUID = -1422103546L;

    public static final QMatricula matricula = new QMatricula("matricula");

    public final NumberPath<Long> codigoSerie = createNumber("codigoSerie", Long.class);

    public final NumberPath<Long> codigoTurno = createNumber("codigoTurno", Long.class);

    public final DateTimePath<java.util.Date> dataCriacao = createDateTime("dataCriacao", java.util.Date.class);

    public final DateTimePath<java.util.Date> dataManutencao = createDateTime("dataManutencao", java.util.Date.class);

    public final DateTimePath<java.util.Date> dataMatricula = createDateTime("dataMatricula", java.util.Date.class);

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public QMatricula(String variable) {
        super(Matricula.class, forVariable(variable));
    }

    public QMatricula(Path<? extends Matricula> path) {
        super(path.getType(), path.getMetadata());
    }

    public QMatricula(PathMetadata<?> metadata) {
        super(Matricula.class, metadata);
    }

}

