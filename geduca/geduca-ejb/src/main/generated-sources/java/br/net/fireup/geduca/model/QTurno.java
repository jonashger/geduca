package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QTurno is a Querydsl query type for Turno
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QTurno extends EntityPathBase<Turno> {

    private static final long serialVersionUID = -497319398L;

    public static final QTurno turno = new QTurno("turno");

    public final NumberPath<Long> codigoEmpresa = createNumber("codigoEmpresa", Long.class);

    public final StringPath descricao = createString("descricao");

    public final TimePath<java.util.Date> horaFim = createTime("horaFim", java.util.Date.class);

    public final TimePath<java.util.Date> horaInicio = createTime("horaInicio", java.util.Date.class);

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final TimePath<java.util.Date> tempoAula = createTime("tempoAula", java.util.Date.class);

    public QTurno(String variable) {
        super(Turno.class, forVariable(variable));
    }

    public QTurno(Path<? extends Turno> path) {
        super(path.getType(), path.getMetadata());
    }

    public QTurno(PathMetadata<?> metadata) {
        super(Turno.class, metadata);
    }

}

