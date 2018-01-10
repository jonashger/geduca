package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QTipoContato is a Querydsl query type for TipoContato
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QTipoContato extends EntityPathBase<TipoContato> {

    private static final long serialVersionUID = 865539294L;

    public static final QTipoContato tipoContato = new QTipoContato("tipoContato");

    public final StringPath descricao = createString("descricao");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public QTipoContato(String variable) {
        super(TipoContato.class, forVariable(variable));
    }

    public QTipoContato(Path<? extends TipoContato> path) {
        super(path.getType(), path.getMetadata());
    }

    public QTipoContato(PathMetadata<?> metadata) {
        super(TipoContato.class, metadata);
    }

}

