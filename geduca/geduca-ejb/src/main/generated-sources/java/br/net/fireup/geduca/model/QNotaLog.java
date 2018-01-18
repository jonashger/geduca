package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QNotaLog is a Querydsl query type for NotaLog
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QNotaLog extends EntityPathBase<NotaLog> {

    private static final long serialVersionUID = 1911995646L;

    public static final QNotaLog notaLog = new QNotaLog("notaLog");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final NumberPath<Long> materia = createNumber("materia", Long.class);

    public final StringPath nota = createString("nota");

    public final NumberPath<java.math.BigDecimal> numeroNota = createNumber("numeroNota", java.math.BigDecimal.class);

    public final NumberPath<Long> pessoa = createNumber("pessoa", Long.class);

    public final DateTimePath<java.util.Date> serie = createDateTime("serie", java.util.Date.class);

    public QNotaLog(String variable) {
        super(NotaLog.class, forVariable(variable));
    }

    public QNotaLog(Path<? extends NotaLog> path) {
        super(path.getType(), path.getMetadata());
    }

    public QNotaLog(PathMetadata<?> metadata) {
        super(NotaLog.class, metadata);
    }

}

