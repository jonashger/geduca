package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QTipoSexo is a Querydsl query type for TipoSexo
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QTipoSexo extends EntityPathBase<TipoSexo> {

    private static final long serialVersionUID = -122192235L;

    public static final QTipoSexo tipoSexo = new QTipoSexo("tipoSexo");

    public final StringPath descricao = createString("descricao");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public QTipoSexo(String variable) {
        super(TipoSexo.class, forVariable(variable));
    }

    public QTipoSexo(Path<? extends TipoSexo> path) {
        super(path.getType(), path.getMetadata());
    }

    public QTipoSexo(PathMetadata<?> metadata) {
        super(TipoSexo.class, metadata);
    }

}

